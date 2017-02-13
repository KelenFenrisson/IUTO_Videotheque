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

  function get_all_films(){
    $sql = "select * from films";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function get_all_acteurs(){
    $sql = "select * from individus";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function get_all_genres(){
    $sql = "select * from genres";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

	function films_par_acteurs($acteur){
		$sql = "select code_film,titre_original,titre_francais,pays,date,duree,couleur,realisateur,image
						from films natural join acteurs natural join individus
						where code_indiv = $acteurs ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function films_par_genre($genre){
		$sql = "select code_film,titre_original,titre_francais,pays,date,duree,couleur,realisateur,image
						from films natural join acteurs natural join individus
						where code_indiv = $genre ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function acteurs_par_film($film){
		$sql = "select code_indiv,nom,prenom,nationalite,date_naiss,date_mort
						from films natural join acteurs natural join individus
						where code_indiv = $film ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function acteurs_par_genre($genre){
		$sql = "select code_indiv,nom,prenom,nationalite,date_naiss,date_mort
						from films natural join acteurs natural join individus
						where code_indiv = $genre ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function genres_par_film($film){
		$sql = "select nom_genre
						from films natural join acteurs natural join individus
						where code_indiv = $film ";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function genres_par_acteur($acteur){
		$sql = "select nom_genre
						from films natural join acteurs natural join individus
						where code_indiv = $acteur";
		$stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}
?>
