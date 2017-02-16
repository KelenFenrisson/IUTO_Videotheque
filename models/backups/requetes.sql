########################################################################################################################
#
# SELECTIONS
#
########################################################################################################################

# TOUS LES INDIVIDUS
SELECT * from individus ORDER BY nom,prenom;

# TOUS LES FILMS
SELECT * from films ORDER BY titre_original;

# TOUS LES GENRES
SELECT * from genres ORDER BY nom_genre;

# TOUS LES ACTEURS
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN individus NATURAL JOIN acteurs
ORDER BY nom, prenom;

# TOUS LES REALISATEURS
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
ORDER BY nom, prenom;


# TOUS LES FILMS D'UN ACTEUR
SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
WHERE code_indiv = ?
ORDER BY titre_original, titre_francais;

# TOUS LES FILMS D'UN REALISATEUR
SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
WHERE code_indiv=?
ORDER BY titre_original,titre_francais;

# TOUS LES FILMS D'UN GENRE
SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
FROM films NATURAL JOIN  classification NATURAL JOIN  genres
WHERE code_genre= ?;

# TOUS LES ACTEURS D'UN FILM
SELECT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
WHERE code_film = ? ;

# TOUS LES ACTEURS D'UN GENRE
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films natural join acteurs natural join individus
  NATURAL JOIN classification NATURAL JOIN  genres
WHERE code_genre = ?;

# TOUS LES ACTEURS AYANT TRAVAILLE AVEC UN REALISATEUR
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN individus NATURAL JOIN acteurs
WHERE code_film IN (SELECT code_film FROM films NATURAL JOIN realisateurs WHERE code_indiv=?)
ORDER BY nom, prenom;

# LE REALISATEUR D'UN FILM
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
WHERE code_film=?
ORDER BY nom, prenom;

# TOUS LES REALISATEURS AYANT TRAVAILLE AVEC UN ACTEUR
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN individus NATURAL JOIN realisateurs NATURAL JOIN acteurs
WHERE code_film IN (SELECT code_film FROM films NATURAL JOIN acteurs WHERE code_indiv=?)
ORDER BY nom, prenom;

# TOUS LES GENRES ABORDES PAR UN REALISATEUR
SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
FROM films NATURAL JOIN individus NATURAL JOIN realisateurs NATURAL JOIN genres
WHERE code_genre=?
ORDER BY nom, prenom;

# LES GENRES D'UN FILM
SELECT nom_genre
FROM films NATURAL JOIN  classification NATURAL JOIN  genres
WHERE code_film = ?
ORDER BY nom_genre;

# LES ACTEURS D'UN GENRE
SELECT nom_genre
FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
  NATURAL JOIN classification NATURAL JOIN  genres
WHERE code_indiv = ?
ORDER BY nom_genre;

# LES REALISATEURS D'UN GENRE
SELECT nom_genre
FROM films NATURAL JOIN realisateurs NATURAL JOIN  individus
  NATURAL JOIN classification NATURAL JOIN  genres
WHERE code_indiv = ?
ORDER BY nom_genre;



INSERT INTO films(code_film,titre_original,titre_francais,pays,date,duree,couleur,image) VALUES (?,?,?,?,?,?,?,?);

INSERT INTO individus(code_indiv,nom,prenom,nationalite,date_naiss,date_mort) VALUES (?,?,?,?,?,?);

INSERT INTO acteurs VALUES (?,?);

INSERT INTO realisateurs VALUES (?,?);

INSERT INTO genres(code_genre,nom_genre) VALUES (?,?);



DELETE FROM films WHERE code_film=?;

DELETE FROM individus WHERE code_indiv=?;

DELETE FROM acteurs WHERE code_indiv=? and code_film=?;

DELETE FROM realisateurs WHERE code_indiv=? and code_film=?;

DELETE FROM genres WHERE code_genre=?;



UPDATE films SET titre_original=?,titre_francais=?,pays=?,date=?,duree=?,couleur=?,image=? where code_film=?;

UPDATE individus SET nom=?,prenom=?,nationalite=?,date_naiss=?,date_mort=? where code_indiv=?;

UPDATE genres SET nom_genre=? where code_genre=?;

