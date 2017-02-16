<?php

require("connect.php");

function connect_bd(){
    $dsn="mysql:dbname=".BASE.";host=".SERVER.";charset=utf8";
    try{
        $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
        printf("Échec de la connexion : %s\n", $e->getMessage());
        exit();
    }
    return $connexion;
}

class Recherche{

    static $connexion;

    function __construct(){
        $this->connexion = connect_bd();
    }



    /*******************************************************************************************************************
     * -- CONSULTATION
     *
     * get_all_films()()
     * films_par_acteurs($acteur)
     * films_par_genre($genre)
     * films_par_realisateur($realisateur)
     *
     * get_all_acteurs()()
     * acteurs_par_film($film)
     * acteurs_par_genre_action($genre)
     * acteurs_par_realisateur($director)
     *
     * get_all_genres()
     * genre_by_film($film)
     * genre_by_acteurs($actor)
     * genre_by_realisateur($director)
     *
     * get_all_realisateurs()
     * director_by_film($film)
     * director_by_acteurs($actor)
     * director_by_genre($genre)
     *
     * ****************************************************************************************************************/

    // recherche tous les films
    function get_all_films(){
        $sql = "SELECT * from films ORDER BY titre_original";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //recherche tous les films d'un acteur
    function films_par_acteurs($acteur){
        $sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
                FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
                WHERE code_indiv = ? 
                ORDER BY titre_original, titre_francais";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($acteur));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // recherche tous les films d'un realisateur
    function films_par_realisateur($realisateur){
        $sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
				FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
				WHERE code_indiv=?
				ORDER BY titre_original,titre_francais";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($realisateur));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //recherche tous les films d'un même genres
    function films_par_genre($genre){
        $sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
                FROM films NATURAL JOIN  classification NATURAL JOIN  genres
                WHERE code_genre= ?";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($genre));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**********************************************************************************************************************/

// recherche tous les acteurs et les trie dans l'ordre alphabetique nom puis prenom
    function get_all_acteurs(){
        $sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN acteurs
				ORDER BY nom, prenom";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
// recherche tous les acteurs d'un film
    function acteurs_par_film($film){
        $sql = "SELECT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_film = ? ";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($film));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // recherche les acteurs d'un genre
    function acteurs_par_genre($genre){
        $sql = "SELECT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
						FROM films natural join acteurs natural join individus
						NATURAL JOIN classification NATURAL JOIN  genres
						WHERE code_genre = ? ";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($genre));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // recherche tous les acteurs ayant collaboré avec un realisateur
    function acteurs_par_realisateurs($realisateur){
        $sql = "SELECT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN acteurs
				WHERE code_film IN (SELECT code_film FROM films NATURAL JOIN realisateurs WHERE code_indiv=?)
				ORDER BY nom, prenom";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($realisateur));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**********************************************************************************************************************/


// recherche tous les realisateur et les trie dans l'ordre alphabetique nom puis prenom
    function get_all_realisateurs(){
        $sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
				ORDER BY nom, prenom";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// recherche le realisateur d'un film
    function realisateurs_par_film($film_id){
        $sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
				WHERE code_film=?
				ORDER BY nom, prenom";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($film_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// recherche tous les realisateur ayant collaboré avec un acteur
    function realisateurs_par_acteur($acteur_id){
        $sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN realisateurs NATURAL JOIN acteurs
				WHERE code_film IN (SELECT code_film FROM films NATURAL JOIN acteurs WHERE code_indiv=?)
				ORDER BY nom, prenom";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($acteur_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// recherche tous les realisateur pour un genre donné
    function realisateurs_par_genre($genre_id){
        $sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN realisateurs NATURAL JOIN genres
				WHERE code_genre=?
				ORDER BY nom, prenom";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($genre_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**********************************************************************************************************************/

// recherche tous les genres et les trie par nom
    function get_all_genres(){
        $sql = "SELECT * from genres ORDER BY nom_genre";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//recherche tous les genres d'un film
    function genres_par_film($film_id){
        $sql = "SELECT nom_genre
		FROM films NATURAL JOIN  classification NATURAL JOIN  genres
		WHERE code_film = ? 
		ORDER BY nom_genre";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($film_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//recherche tous les genres d'un acteur
    function genres_par_acteur($acteur_id){
        $sql = "SELECT nom_genre
		FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
		NATURAL JOIN classification NATURAL JOIN  genres
		WHERE code_indiv = ?
		ORDER BY nom_genre";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($acteur_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//recherche tous les genres d'un realisateur
    function genres_par_realisateur($realisateur_id){
        $sql = "SELECT nom_genre
		FROM films NATURAL JOIN realisateurs NATURAL JOIN  individus
		NATURAL JOIN classification NATURAL JOIN  genres
		WHERE code_indiv = ?
		ORDER BY nom_genre";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(array($realisateur_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**********************************************************************************************************************/

//ajout d'un film
    function ajout_film($film){
        $sql = " INSERT INTO films(code_film,titre_original,titre_francais,pays,date,duree,couleur,image) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connexion->prepare($sql);
        return $stmt->execute(array($film['code_film'],$film['titre_original'],$film['titre_francais'],$film['pays'],$film['date'],$film['duree'],$film['couleur'],$film['image']));
    }

//ajout d'un individu
    function ajout_individu($individu){
        $sql = " INSERT INTO individus(code_indiv,nom,prenom,nationalite,date_naiss,date_mort) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connexion->prepare($sql);
        return $stmt->execute(array($individu['code_indiv'],$individu['nom'],$individu['prenom'],$individu['nationalite'],$individu['date_naiss'],$individu['date_mort']));
    }

//ajout d'un acteur
    function ajout_acteur($individu, $film_id){
        $req1=$this->ajout_individu($individu); // valeur booleenne
        $sql = " INSERT INTO acteurs VALUES (?,?);";
        $stmt = $this->connexion->prepare($sql);
        $req2=$stmt->execute(array($individu['code_indiv'], $film_id));// valeur booleenne
        return ($req1 and $req2);
    }

//ajout d'un realisateur
    function ajout_realisateur($individu, $film_id){
        $req1=$this->ajout_individu($individu); // valeur booleenne
        $sql = " INSERT INTO realisateurs VALUES (?,?);";
        $stmt = $this->connexion->prepare($sql);
        $req2=$stmt->execute(array($individu['code_indiv'], $film_id));// valeur booleenne
        return ($req1 and $req2);
    }

//ajout d'un genre
    function ajout_genre($genre){
        $sql = " INSERT INTO genres(code_genre,nom_genre) VALUES (?,?)";
        $stmt = $this->connexion->prepare($sql);
        return $stmt->execute(array($genre['code_genre'],$genre['nom_genre']));
    }


//supression d'un film
    function suppr_film($film){
        $sql="DELETE FROM films WHERE code_film=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($film)) ;
    }

//supression d'un individu
    function suppr_individu($individu_id){
        $sql="DELETE FROM individus WHERE code_indiv=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($individu_id));
    }

//supression d'un acteur
    function suppr_acteur($individu_id, $film_id){
        $sql="DELETE FROM acteurs WHERE code_indiv=? and code_film=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($individu_id, $film_id));
    }

//supression d'un realisateur
    function suppr_realisateur($individu_id, $film_id){
        $sql="DELETE FROM realisateurs WHERE code_indiv=? and code_film=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($individu_id, $film_id));
    }

//supression d'un genre
    function suppr_genre($genre){
        $sql="DELETE FROM genres WHERE code_genre=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($genre));
    }

//modification d'un film (avec $film toutes les valeurs)
    function modif_film($film){
        $sql = "UPDATE films SET titre_original=?,titre_francais=?,pays=?,date=?,duree=?,couleur=?,image=? where code_film=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($film['titre_original'],$film['titre_francais'],$film['pays'],$film['date'],$film['duree'],$film['couleur'],$film['image'],$film['code_film'],));
    }

//modification d'un individu (avec $individu toutes les valeurs)
    function modif_individu($individu){
        $sql = "UPDATE individus SET nom=?,prenom=?,nationalite=?,date_naiss=?,date_mort=? where code_indiv=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($individu['nom'],$individu['prenom'],$individu['nationalite'],$individu['date_naiss'],$individu['date_mort']));
    }

//modification d'un genre (avec $genre toutes les valeurs)
    function modif_genre($genre){
        $sql = "UPDATE genres SET nom_genre=? where code_genre=?";
        $stmt=$this->connexion->prepare($sql);
        return $stmt->execute(array($genre['nom_genre'],$genre['code_genre']));
    }

}
?>
