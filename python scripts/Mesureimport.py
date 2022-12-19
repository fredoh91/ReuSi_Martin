# Il y a eu pas mal de confusion dans le schéma de la bdd, ici il n'y qu'un relevé de décision par signal.

import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb
import pandas as pd
import numpy as np
import math
import importUtils as IU
from io import StringIO

#Variable globales
MAX_ID = 446

#Connection à la database
database = MySQLdb.connect(host="localhost", user="root", passwd="root", db="reusi")
cursor = database.cursor()

#Lecture et traitement initial du document excel
excel_data = pd.read_excel('data/FaitsMarquants.xlsx', sheet_name='Signaux', dtype={'Id': str})
df = excel_data[2:]

df.Id = df.Id[df.Id.apply(lambda x: False if pd.isnull(x) else x.isnumeric())]  #Vide les vides non numériques
df = df[df.Id.notna()]                                                          #Supprime les lignes vide
df.Id = df.Id.apply(pd.to_numeric)                                              #Cast en int64
df = df.loc[df['Id'] <= MAX_ID]
df.drop_duplicates(subset=['Id'], inplace=True)

insert_query = 'INSERT INTO reusi.mesure (Description, MesureReleveDecision_id)\
    VALUES (%s, %s)'

for row in df.iterrows():
    sig_id = row[1][0]
    desc = row[1][12]

    # Recherche de l'id du releve de decision relié au signal_id
    search_query = "SELECT id FROM reusi.relevedecision WHERE ReleveDecisionSignal_id='%s'"
    cursor.execute(search_query, [sig_id]) #Fetchone car il n'y à qu'un seul résultat dans la configuration actuelle, à changer si il peut y en avoir plusieurs
    releve_id = cursor.fetchone()

    entry_values = [desc, releve_id]
    for i,v in enumerate(entry_values) : # Permet d'éviter le NaN, remplace par None
        if (pd.isna(v)):
            entry_values[i] = None
    entries = tuple(entry_values)

    try:
        cursor.execute(insert_query, entries)
    except:
        print(cursor._last_executed)
        raise
    database.commit()

cursor.close()
database.close()