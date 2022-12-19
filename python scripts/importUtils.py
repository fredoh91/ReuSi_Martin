import pymysql
pymysql.install_as_MySQLdb()
import MySQLdb

def importDMM(cursor):
    sql = "SELECT Libelle, id from dmm"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importPoleDS(cursor):
    sql = "SELECT Libelle, id from poleds"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importSourceSignal(cursor):
    sql = "SELECT Libelle, id from sourcesignal"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importPiloteDS(cursor):
    sql = "SELECT Libelle, id from piloteds"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importStatutEmetteur(cursor):
    sql = "SELECT Libelle, id from statutemetteur"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importStatutSignal(cursor):
    sql = "SELECT Libelle, id from statutsignal"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importCoPiloteDS(cursor):
    sql = "SELECT Libelle, id from copiloteds"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importEmetteurSuivi(cursor):
    sql = "SELECT Libelle, id from emetteursuivi"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importPassageCTP(cursor):
    sql = "SELECT Libelle, id from passagectp"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)

def importPassageRSS(cursor):
    sql = "SELECT Libelle, id from passagerss"
    cursor.execute(sql)
    result = cursor.fetchall()
    return dict(result)