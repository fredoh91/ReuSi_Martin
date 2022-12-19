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

#Récupération des tables de référence du signal directement depuis la BDD
dmmDict = IU.importDMM(cursor)
coPiloteDSDict = IU.importCoPiloteDS(cursor)
piloteDSDict = IU.importPiloteDS(cursor)
poleDSDict = IU.importPoleDS(cursor)
sourceSignalDict = IU.importSourceSignal(cursor)
statutEmetteurDict = IU.importStatutEmetteur(cursor)
statutSignalDict = IU.importStatutSignal(cursor)

#Lecture et traitement initial du document excel
excel_data = pd.read_excel('data/FaitsMarquants.xlsx', sheet_name='Signaux', dtype={'Id': str})
df = excel_data[2:]

df.Id = df.Id[df.Id.apply(lambda x: False if pd.isnull(x) else x.isnumeric())]  #Vide les vides non numériques
df = df[df.Id.notna()]                                                          #Supprime les lignes vide
df.Id = df.Id.apply(pd.to_numeric)                                              #Cast en int64
df = df.loc[df['Id'] <= MAX_ID]
df.drop_duplicates(subset=['Id'], inplace=True)

insert_query = 'INSERT IGNORE INTO reusi.signal (id, Indication, Description, NiveauRisqueFinal, StatutEmetteur_id, AnaRisqueComment, Contexte, SourceSignal_id, PoleDS_id, DMM_id, PiloteDS_id, CoPiloteDS_id, StatutSignal_id)\
    VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'

statutEmetteur_insert_query = 'INSERT INTO reusi.statutemetteur (Libelle, Actif)\
    VALUES (%s, %s)'

sourceSignal_insert_query = 'INSERT INTO reusi.sourcesignal (Libelle, Actif)\
    VALUES (%s, %s)'

poleDS_insert_query = 'INSERT INTO reusi.poleds (Libelle, Actif)\
    VALUES (%s, %s)'

dmm_insert_query = 'INSERT INTO reusi.dmm (Libelle, Actif)\
    VALUES (%s, %s)'

piloteDS_insert_query = 'INSERT INTO reusi.piloteds (Libelle, Actif)\
    VALUES (%s, %s)'

coPiloteDS_insert_query = 'INSERT INTO reusi.copiloteds (Libelle, Actif)\
    VALUES (%s, %s)'

statutSignal_insert_query = 'INSERT INTO reusi.statutsignal (Libelle, Actif)\
    VALUES (%s, %s)'

for row in df.iterrows():
    id = row[1][0]
    indication = row[1][6]
    description = row[1][7]
    niveauRisque = row[1][8]
    statutEmetteur = row[1][9]
    if (statutEmetteur in statutEmetteurDict) :
        statutEmetteur = statutEmetteurDict[statutEmetteur]
    else :
        if (not pd.isna(statutEmetteur)):
            cursor.execute(statutEmetteur_insert_query, (statutEmetteur, 0))
            statutEmetteurDict = IU.importStatutEmetteur(cursor)
    anaRisqueComment = row[1][10]
    contexte = row[1][11]
    sourceSignal = row[1][13]
    if (sourceSignal in sourceSignalDict) :
        sourceSignal = sourceSignalDict[sourceSignal]
    else :
        if (not pd.isna(sourceSignal)):
            cursor.execute(sourceSignal_insert_query, (sourceSignal, 0))
            sourceSignalDict = IU.importSourceSignal(cursor)
    poleDS = row[1][15]
    if (poleDS in poleDSDict) :
        poleDS = poleDSDict[poleDS]
    else :
        if (not pd.isna(poleDS)):
            cursor.execute(poleDS_insert_query, (poleDS, 0))
            poleDSDict = IU.importPoleDS(cursor)
    dmm = row[1][16]
    if (dmm in dmmDict) :
        dmm = dmmDict[dmm]
    else :
        if (not pd.isna(dmm)):
            cursor.execute(dmm_insert_query, (dmm, 0))
            dmmDict = IU.importDMM(cursor)
    piloteDS = row[1][17]
    if (piloteDS in piloteDSDict) :
        piloteDS = piloteDSDict[piloteDS]
    else :
        if (not pd.isna(piloteDS)):
            cursor.execute(piloteDS_insert_query, (piloteDS, 0))
            piloteDSDict = IU.importPiloteDS(cursor)
    coPiloteDS = row[1][18]
    if (coPiloteDS in coPiloteDSDict) :
        coPiloteDS = coPiloteDSDict[coPiloteDS]
    else :
        if (not pd.isna(coPiloteDS)):
            cursor.execute(coPiloteDS_insert_query, (coPiloteDS, 0))
            coPiloteDSDict = IU.importCoPiloteDS(cursor)
    statutSignal = row[1][23]
    if (statutSignal in statutSignalDict) :
        statutSignal = statutSignalDict[statutSignal]
    else :
        if (not pd.isna(statutSignal)):
            cursor.execute(statutSignal_insert_query, (statutSignal, 0))
            statutSignalDict = IU.importStatutSignal(cursor)

    entry_values = [id, indication, description, niveauRisque, statutEmetteur, anaRisqueComment, contexte, sourceSignal, poleDS, dmm, piloteDS, coPiloteDS, statutSignal]
    for i,v in enumerate(entry_values) :
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