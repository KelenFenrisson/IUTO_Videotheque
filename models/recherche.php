<?php

require("connect.php");

function connect_bd(){
	$dsn="mysql:dbname=".BASE.";host=".SERVER;
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

// recherche tous les acteurs
  function get_all_acteurs(){
    $sql = "SELECT * from individus";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

// recherche tous les genres
  function get_all_genres(){
    $sql = "SELECT * from genres";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

//recherche tous les films d'un acteur
	function films_par_acteurs($acteur){
		$sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,realisateur,image
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_indiv = $acteurs ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//recherche tous les films d'un même genres
	function films_par_genre($genre){
		$sql = "SELECT code_film,titre_original,titre_francais,pays,date,duree,couleur,realisateur,image
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_genre = $genre ";
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
						WHERE code_genre = $genre ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//recherche tous les genres d'un film
	function genres_par_film($film){
		$sql = "SELECT nom_genre
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_film = $film ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//recherche tous les genres d'un acteur
	function genres_par_acteur($acteur){
		$sql = "SELECT nom_genre
						FROM films NATURAL JOIN  acteurs NATURAL JOIN  individus
						WHERE code_indiv = $acteur";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

//ajout d'un film
function ajout_film($film){
	$sql = " INSERT INTO films(code_film,titre_original,titre_francais,pays,date,duree,couleur,realisateur,image) VALUES (?,?,?,?,?,?,?,?,?)";
	$stmt = $this->connexion->prepare($sql);
	return $stmt->execute(array($film['code_film'],$film['titre_original'],$film['titre_francais'],$film['pays'],$film['date'],$film['duree'],$film['couleur'],$film['realisateur'],$film['image']));
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

//supression d'un film
function suppr_film($film){
	$sql="DELETE FROM films WHERE ID=$film";
	$stmt=$this->connexion->prepare($sql);
	return $stmt-execute() ;
}

//supression d'un acteur
function suppr_acteur($acteur){
	$sql="DELETE FROM individus WHERE ID=$acteur";
	$stmt=$this->connexion->prepare($sql);
	return $stmt-execute();
}

//supression d'un genre
function suppr_genre($genre){
	$sql="DELETE FROM genres WHERE ID=$genre";
	$stmt=$this->connexion->prepare($sql);
	return $stmt-execute();
}

//modification d'un film (avec $film toutes les valeurs)
function modif_film($film){
$sql = "UPDATE films SET titre_original=?,titre_francais=?,pays=?,date=?,duree=?,couleur=?,realisateur=?,image=? where code_film=?";
$stmt=$this->connexion->prepare($sql);
return $stmt->execute(array($film['titre_original'],$film['titre_francais'],$film['pays'],$film['date'],$film['duree'],$film['couleur'],$film['realisateur'],$film['image'],$film['code_film'],));
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
