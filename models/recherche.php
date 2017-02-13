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
    $resultat="erreur requete";
    $sql = "select * from films;";
    $stmt = $this->connexion->prepare($sql);
    if($stmt->execute()){
      $resultat=$stmt->fetchAll(PDO::FETCH_ASSOC);
    } else{echo "prout";}
    return $resultat;
  }

  function get_all_acteurs(){
    $sql = "select * from individus";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  function get_all_genres(){
    $sql = "select * from genres";
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }

}
?>
