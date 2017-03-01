# IUTO VIDEOTHEQUE

## Installation

Pour installer le projet : 
- installer LAMP/WAMP/MAMP
- installer Composer
- copier le dossier du projet à l'endroit désiré
- créer la base de données contenant les tables créées par les scripts
SQL du dossier /models.
- dans le dossier models, créer un fichier nommé connect.php contenant : 
<?php
define('USER',"votre login mysql ici");
define('PASSWD',"votre mot de passe mysql ici");
define('SERVER',"IP ou nom du server mysql");
define('BASE',"nom de la base de données");

## Structure

### /doc
#### Documentation.md

### /models
Fichiers en relation avec la base de données
#### /backups
quelques backups residuels du projet
#### acteurs.sql
Script de création et population de la table acteurs
#### classification.sql
Script de création et population de la table classification
#### films.sql
Script de création et population de la table films
#### genres.sql
Script de création et population de la table genres
#### individus.sql
Script de création et population de la table individus
#### realisateurs.sql
Script de création et population de la table realisateurs
#### recherche.php
fichier php contenant le script de connection a la base de données et 
une classe recherche qui gère des requetes pré-établies.
#### _votre connect.php_
Ce fichier doit contenir le code necessaire à la connection à la BDD 

### /static
#### static.md
Un fichier residuel d'iformation obtenues pendant le cours
#### knacss.css
Un fichier css qui n'est pas utilisé 
#### styles.css
Le fichier css utilisé par le projet

### /templates
#### /img
Contient les images utilisées par le projet
#### accueil.html
page d'accueil
#### acteurs.html
page contenant l'affichage de la liste des acteurs
#### BaseTemplate.html
template de base
#### error.html
page d'erreur (404 et autres)
#### films.html
page contenant l'affichage de la liste des films
#### genres.html
page contenant l'affichage de la liste des genres
#### peoples.html
page contenant l'affichage de la liste des peoples
#### realisateurs.html
page contenant l'affichage de la liste des realisateurs

### /vendor
fichier exploité par twig et composer
royaume magique du templating. 
Nous nous dégageons de toute responsabilité si vous touchez a ces fichiers

### composer.json
fichier exploité par twig et composer
royaume magique du templating. 
Nous nous dégageons de toute responsabilité si vous touchez a ce fichiers

### composer.lock
fichier exploité par twig et composer
royaume magique du templating. 
Nous nous dégageons de toute responsabilité si vous touchez a ce fichiers

### README.md
Ce fichier.

### accueil.php
fichier alimentant accueil.html
### acteurs.php
fichier alimentant acteurs.html
### controllers.php
fichier faisant le lien entre index.php et recherche.php
regroupe les fonctions de jonction entre requete et template
 
### error404.php
fichier alimentant error.html
### films.php
fichier alimentant films.html
### genres.php
fichier alimentant genres.html
### index.php
aiguilleur du projet, s'occupe de l'orientation de l'utilisateur et du filtrage
des informations qu'il saisit.

### peoples.php
fichier alimentant peoples.html
### realisateurs.php
fichier alimentant realisateurs.html

## Sources

Les cours de l'IUT d'orleans sur le modèle MVC.

https://getcomposer.org/
http://schnaps.it/ pour le css
