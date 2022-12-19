# Noticie d'utilisation
# Il faut de manière général lancer les programmes 2 fois pour importer les données
import traceback
import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb
import pandas as pd
import numpy as np
import math
import importUtils as IU
import sys, os
from io import StringIO

#Variable globales
MAX_ID = 446

#Connection à la database
database = MySQLdb.connect(host="localhost", user="root", passwd="root", db="reusi")
cursor = database.cursor()

#Import des tables de référence
emetteurSuiviDict = IU.importEmetteurSuivi(cursor)

#Lecture et traitement initial du document excel
excel_data = pd.read_excel('data/FaitsMarquants.xlsx', sheet_name='Suivi', dtype={'Id': str})
df = excel_data[2:]

df.Id = df.Id[df.Id.apply(lambda x: False if pd.isnull(x) else x.isnumeric())]  #Vide les vides non numériques
df = df[df.Id.notna()]                                                          #Supprime les lignes vide
df.Id = df.Id.apply(pd.to_numeric)                                              #Cast en int64
df = df.loc[df['Id'] <= MAX_ID]
df.drop_duplicates(subset=['Id'], inplace=True)

insert_query = 'INSERT IGNORE INTO reusi.suivi (SuiviSignal_id, DateSuivi, Description, EmetteurSuivi_id)\
    VALUES  (%s, %s, %s ,%s)'

emetteurSuivi_insert_query = 'INSERT INTO reusi.emetteursuivi (Libelle, Actif)\
    VALUES (%s, %s)'

for row in df.iterrows():
    suiviSignal_id = row[1][0]
    dateSuivi = row[1][2]
    emetteurSuivi = row[1][3]
    if (emetteurSuivi in emetteurSuiviDict) :
        emetteurSuivi = emetteurSuiviDict[emetteurSuivi]
    else :
        if (not pd.isna(emetteurSuivi)):
            cursor.execute(emetteurSuivi_insert_query, (emetteurSuivi, 0))
            emetteurSuiviDict = IU.importEmetteurSuivi(cursor)
    description = row[1][5]

    entry_values = [suiviSignal_id, dateSuivi, description, emetteurSuivi]
    for i,v in enumerate(entry_values) :
        if (pd.isna(v)):
            entry_values[i] = None
    entries = tuple(entry_values)
    try:
        cursor.execute(insert_query, entries)
    except Exception as e :
        f = open("data/LogSuivi.txt", "a")
        f.write(traceback.format_exc())
        f.close()
    database.commit()

cursor.close()
database.close()