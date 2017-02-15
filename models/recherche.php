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

// recherche tous les films
  function get_all_films(){
    $sql = "SELECT * from films ORDER BY titre_original";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

// recherche tous les realisateurs
	function get_all_realisateurs(){
		$sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN realisateurs
				ORDER BY nom, prenom";
		$stmt = $this->connexion->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

// recherche tous les films noir et blanc
    function get_all_noiretblanc(){
        $sql = "SELECT * from films
				WHERE couleur='NB'
				ORDER BY titre_original";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// recherche tous les films en couleur
    function get_all_couleur(){
        $sql = "SELECT * from films
				WHERE couleur='couleur'
				ORDER BY titre_original";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// recherche tous les acteurs
  function get_all_acteurs(){
    $sql = "SELECT DISTINCT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
				FROM films NATURAL JOIN individus NATURAL JOIN acteurs
				ORDER BY nom, prenom";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

// recherche tous les genres
  function get_all_genres(){
    $sql = "SELECT * from genres ORDER BY nom_genre";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

//recherche tous les films d'un acteur
	function films_par_acteurs($acteur){
		$sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_indiv = $acteur ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

    //recherche tous les films d'un realisateur
    function films_par_realisateur($realisateur){
        $sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
						FROM films NATURAL JOIN  realisateurs NATURAL JOIN  individus
						WHERE code_indiv = $realisateur";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//recherche tous les films d'un même genres
	function films_par_genre($genre){
		$sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,image
		FROM films NATURAL JOIN  classification NATURAL JOIN  genres
		WHERE code_genre=$genre";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

// recherche tous les acteurs d'un film
	function acteurs_par_film($film){
		$sql = "SELECT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_film = $film ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

// recherche les acteurs d'un genre
	function acteurs_par_genre($genre){
		$sql = "SELECT code_indiv,nom,prenom,nationalite,date_naiss,date_mort
						FROM films natural join acteurs natural join individus
						NATURAL JOIN classification NATURAL JOIN  genres
						WHERE code_genre = $genre ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//recherche tous les genres d'un film
	function genres_par_film($film){
		$sql = "SELECT nom_genre
		FROM films NATURAL JOIN  classification NATURAL JOIN  genres
		WHERE code_film = $film ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//recherche tous les genres d'un acteur
	function genres_par_acteur($acteur){
		$sql = "SELECT nom_genre
		FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
		NATURAL JOIN classification NATURAL JOIN  genres
		WHERE code_indiv = $acteur";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//ajout d'un film
function ajout_film($film){
	$sql = " INSERT INTO films(code_film,titre_original,titre_francais,pays,date,duree,couleur,image) VALUES (?,?,?,?,?,?,?,?)";
	$stmt = $this->connexion->prepare($sql);
	return $stmt->execute(array($film['code_film'],$film['titre_original'],$film['titre_francais'],$film['pays'],$film['date'],$film['duree'],$film['couleur'],$film['image']));
}

//ajout d'un acteur
function ajout_acteur($acteur){
	$sql = " INSERT INTO individus(code_indiv,nom,prenom,nationalite,date_naiss,date_mort) VALUES (?,?,?,?,?,?)";
	$stmt = $this->connexion->prepare($sql);
	return $stmt->execute(array($acteur['code_indiv'],$acteur['nom'],$acteur['prenom'],$acteur['nationalite'],$acteur['date_naiss'],$acteur['date_mort']));
}

//ajout d'un genre
function ajout_genre($genre){
	$sql = " INSERT INTO genres(code_genre,nom_genre) VALUES (?,?)";
	$stmt = $this->connexion->prepare($sql);
	return $stmt->execute(array($genre['code_genre'],$genre['nom_genre']));
}

//ajout d'un realisateur
    function ajout_realisateur($realisateur){
        $sql = " INSERT INTO individus(code_indiv,nom,prenom,nationalite,date_naiss,date_mort) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connexion->prepare($sql);
        return $stmt->execute(array($realisateur['code_indiv'],$realisateur['nom'],$realisateur['prenom'],$realisateur['nationalite'],$realisateur['date_naiss'],$realisateur['date_mort']));
    }
//supression d'un film
function suppr_film($film){
	$sql="DELETE FROM films WHERE code_film=?";
	$stmt=$this->connexion->prepare($sql);
	return $stmt->execute(array($film)) ;
}

//supression d'un acteur
function suppr_acteur($acteur){
	$sql="DELETE FROM individus WHERE code_indiv=?";
	$stmt=$this->connexion->prepare($sql);
	return $stmt->execute(array($acteur));
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

//modification d'un acteur(avec $acteur toutes les valeurs)
function modif_acteur($acteur){
$sql = "UPDATE individus SET nom=?,prenom=?,nationalite=?,date_naiss=?,date_mort=? where code_indiv=?";
$stmt=$this->connexion->prepare($sql);
return $stmt->execute(array($acteur['nom'],$acteur['prenom'],$acteur['nationalite'],$acteur['date_naiss'],$acteur['date_mort']));
}

//modification d'un genre (avec $genre toutes les valeurs)
function modif_genre($genre){
$sql = "UPDATE genres SET nom_genre=? where code_genre=?";
$stmt=$this->connexion->prepare($sql);
return $stmt->execute(array($genre['nom_genre'],$genre['code_genre']));
}

}
?>
