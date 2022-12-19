#####
C'est scripts python permettent le transfère des données depuis un document excel vers une bdd mysql.

## Installation
Il faut placer les données excel dans un dossier data.
Il n'est pas encore possible de sélectionner les fichier excel sans toucher au code.
Leur nom doivent être, FaitsMarquants.xslx  et  PSR_2019.xslx

L'architecture ressemble donc à ceci:
__init__.py
...
ToMysql.py
data/
    FaitsMarquants.xslx
    PSR_2019.xslx

## Usage
Chaque script doit être executer individuellement.
Il est possible que 2 execution du script soient nécessaire, la première pour les table de références et la deuxième
pour les données.