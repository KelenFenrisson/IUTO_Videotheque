<?php
error_reporting(E_ALL | E_STRICT);
include 'controllers.php';



// FILTRES

$filters = array(

    // champ action : On veut un <string> qui ne soit que des lettres ou un _
    'action' => FILTER_SANITIZE_STRING ,
    // champ id : On veut un <int>, et seulement un <int>
    'id'   => FILTER_SANITIZE_NUMBER_INT,
    'code_film'   =>  FILTER_SANITIZE_NUMBER_INT,
    'code_indiv'   => FILTER_SANITIZE_NUMBER_INT,
    'code_genre'   =>  FILTER_SANITIZE_NUMBER_INT,

    // champs texte : On veut des <string> qui ne soient que des caracteres 'courants'
    'nom_genre' =>    FILTER_SANITIZE_STRING,
    'nom'    =>FILTER_SANITIZE_STRING,
    'prenom'    =>  FILTER_SANITIZE_STRING,
    'nationalite'    => FILTER_SANITIZE_STRING,
    'titre_original'    =>  FILTER_SANITIZE_STRING,
    'titre_francais'    =>  FILTER_SANITIZE_STRING,
    'pays'    =>  FILTER_SANITIZE_STRING,
    'couleur'    => FILTER_SANITIZE_STRING,
    'realisateur'    =>  FILTER_SANITIZE_STRING,

    // champs date : Vu que ça ne sont que des années, on les verifie comme des entiers
    'date'    => FILTER_SANITIZE_NUMBER_INT,
    'date_naiss'    =>  FILTER_SANITIZE_NUMBER_INT,
    'date_mort'    =>  FILTER_SANITIZE_NUMBER_INT,

    // champ image : On veut un <string> qui ne soit pas du code nuisible mais qui puisse etre un URL
    'image'    => FILTER_SANITIZE_ENCODED,
);





// DECOMMENTER CI DESSOUS POUR VOIR COMMENT LE FILTRE AGIT

echo '$_GET';
foreach ($_GET as $entry=>$getval)
{
    echo "<p> Entrée : $entry = $getval</p>";

}
echo '$_GET FILTRAGE';
foreach ($filtered as $entry=>$filval)
{
    echo "<p> Entrée : $entry = $filval</p>";

}




$filtered = filter_input_array(INPUT_GET, $filters);
$action = $filtered['action'] ?? 'index';
$message="";

switch ($action) {
    case "index":
        index_action();
        break;

    case "film_list":
        film_list_action();
        break;

    case "film_by_actor":
        film_by_actor_action($filtered['id']);
        break;

    case "film_by_genre":
        film_by_genre_action($filtered['id']);
        break;

    case "add_film":
        add_film_action($filtered);
        break;
        
    case "edit_film":
        edit_film_action($filtered);
        break;
        
    case "delete_film":
        delete_film_action($filtered['id']);
        break;

    case "actor_list":
        actor_list_action();
        break;

    case "actor_by_genre":
        actor_by_genre_action($filtered['id']);
        break;

    case "actor_by_film":
        actor_by_film_action($filtered['id']);
        break;

    case "add_actor":
        add_actor_action($filtered);
        break;

    case "edit_actor":
        edit_actor_action($filtered);
        break;

    case "delete_actor":
        delete_actor_action($filtered['id']);
        break;

    case "genre_list":
        genre_list_action();
        break;
        
    case "genre_by_film":
        genre_list_action();
        break;
        
    case "genre_by_actor":
        genre_list_action();
        break;

    case "add_genre":
        add_genre_action($filtered);
        break;

    case "edit_genre":
        edit_genre_action($filtered);
        break;

    case "delete_genre":
        delete_genre_action($filtered['id']);
        break;

    case "director_list":
        director_list_action();
        break;

    case "bnw_list":
        bnw_list_action();
        break;

    case "color_list":
        color_list_action();
        break;

    default:
        pagenotfound_action();
}

//header("refresh:4;url=controleur.php");
