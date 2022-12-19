# Ne génère qu'un relevé de décision par signal.
import traceback
import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb
import pandas as pd
import numpy as np
import importUtils as IU

#Variable globales
MAX_ID = 446

#Connection à la database
database = MySQLdb.connect(host="localhost", user="root", passwd="root", db="reusi")
cursor = database.cursor()

#Import des tables de référence
passageCTPDict = IU.importPassageCTP(cursor)
passageRSSDict = IU.importPassageRSS(cursor)

#Lecture et traitement initial du document excel
excel_data = pd.read_excel('data/FaitsMarquants.xlsx', sheet_name='Signaux', dtype={'Id': str})
df = excel_data[2:]

df.Id = df.Id[df.Id.apply(lambda x: False if pd.isnull(x) else x.isnumeric())]  #Vide les vides non numériques
df = df[df.Id.notna()]                                                          #Supprime les lignes vide
df.Id = df.Id.apply(pd.to_numeric)                                              #Cast en int64
df = df.loc[df['Id'] <= MAX_ID]
df.drop_duplicates(subset=['Id'], inplace=True)

insert_query = 'INSERT IGNORE INTO reusi.relevedecision (`ReleveDecisionSignal_id`, InfoAvis, PassageCTP_id, PassageRSS_id)\
    VALUES  (%s, %s, %s, %s)'

passageCTP_insert_query = 'INSERT INTO reusi.passagectp (Libelle, Actif)\
    VALUES (%s, %s)'

passageRSS_insert_query = 'INSERT INTO reusi.passagerss (Libelle, Actif)\
    VALUES (%s, %s)'

for row in df.iterrows():
    releveDecisionSignal_id = row[1][0]
    infoAvis = row[1][20]
    passageCTP = row[1][21]
    if (passageCTP in passageCTPDict) :
        passageCTP = passageCTPDict[passageCTP]
    else :
        if (not pd.isna(passageCTP)):
            cursor.execute(passageCTP_insert_query, (passageCTP, 0))
            passageCTPDict = IU.importPassageCTP(cursor)
    passageRSS = row[1][22]
    if (passageRSS in passageRSSDict) :
        passageRSS = passageRSSDict[passageRSS]
    else :
        if (not pd.isna(passageRSS)):
            cursor.execute(passageRSS_insert_query, (passageRSS, 0))
            passageRSSDict = IU.importPassageRSS(cursor)

    entry_values = [releveDecisionSignal_id, infoAvis, passageCTP, passageRSS]
    for i,v in enumerate(entry_values) :
        if (pd.isna(v)):
            entry_values[i] = None
    entries = tuple(entry_values)

    try:
        cursor.execute(insert_query, entries)
    except Exception as e :
        f = open("data/LogReleve.txt", "a")
        f.write(traceback.format_exc())
        f.close()
    database.commit()

cursor.close()
database.close()