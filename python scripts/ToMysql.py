# Ce script importe les données pour l'application recueil PSR
import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb
import pandas as pd

origineDict = { "Enquête PV" : 1, "Grossesse" : 5, "AMM Franco-nationale" : 6, "Classes et produits à risque a priori" : 7, "HTAP" : 8, "Prescrire" : 9, "Que choisir" : 10, "Enquêtes" : 11, "Situation médiatique à risque" : 12, "Mesures de réduction de risque à surveiller" : 13}
dmmDict= { "dmm1" : 1, "dmm2" : 3}
listSurvDict = {
    2019 : 5,
    2020 : 4,
    2021 : 3,
    2022 : 1,
    2023 : 2
}

database = MySQLdb.connect(host="localhost", user="root", passwd="root", db="psr_symfony")
cursor = database.cursor()

excel_data = pd.read_excel('data/PSR_2019.xlsx')
df = excel_data.loc[(excel_data['ListeSurv'] == 2019) & (excel_data['Visible'] == 1)]
df['Produit'] = df['Produit'].fillna('Non renseigné')
df['Risque'] = df['Risque'].fillna(0)
df['Priorisation'] = df['Priorisation'].fillna(0)
df['Commentaire'] = df['Commentaire'].fillna("Pas de commentaire")

insert_query = 'INSERT INTO recpsrtable (origine_id, dmm_id, substance, produit, code_atc, niveau_risque, priorisation, mesImpact_id, visible, commentaire, listSurv_id)\
    VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)'

for row in df.iterrows():
    origine = row[1][8]
    if origine in origineDict :
        origine_id = origineDict[origine]
    else :
        print(origine)
        origine_id = 10
    dmm_id = 1
    substance = row[1][3]
    produit = row[1][4]
    code_atc = row[1][1]
    niveau_risque = row[1][5]
    priorisation = row[1][6]
    mesImpact_id = 1
    visible = True
    commentaire = row[1][7]
    listSurv_id = listSurvDict[2019]

    entry_values = (origine_id, dmm_id, substance, produit, code_atc, niveau_risque, priorisation, mesImpact_id, visible, commentaire, listSurv_id)

    cursor.execute(insert_query, entry_values)
    print(cursor._last_executed)
    break
    database.commit()


cursor.close()
database.close()