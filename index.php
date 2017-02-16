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

    // champs duree et date : Vu que ça ne sont que des années ou minutes, on les verifie comme des entiers
    'duree'    => FILTER_SANITIZE_NUMBER_INT,
    'date'    => FILTER_SANITIZE_NUMBER_INT,
    'date_naiss'    =>  FILTER_SANITIZE_NUMBER_INT,
    'date_mort'    =>  FILTER_SANITIZE_NUMBER_INT,

    // champ image : On veut un <string> qui ne soit pas du code nuisible mais qui puisse etre un URL
    'image'    => FILTER_SANITIZE_ENCODED,
);





// DECOMMENTER CI DESSOUS POUR VOIR COMMENT LE FILTRE AGIT
//
//echo '$_GET';
//foreach ($_GET as $entry=>$getval)
//{
//    echo "<p> Entrée : $entry = $getval</p>";
//
//}
//echo '$_GET FILTRAGE';
//foreach ($filtered as $entry2=>$filval)
//{
//    echo "<p> Entrée : $entry2 = $filval</p>";
//
//}
//
$filtered = filter_input_array(INPUT_GET, $filters);
$action = $filtered['action'] ?? 'index';
$message="";




switch ($action) {
    case "index":
        index_action();
        break;
/////////////////////////////////////////////////   CONSULTATION   /////////////////////////////////////////////////////

    //// FILM

    case "film_list":
        film_list_action();
        break;

    case "film_by_actor":
        film_by_actor_action($filtered['id']);
        break;

    case "film_by_genre":
        film_by_genre_action($filtered['id']);
        break;

    case "film_by_director":
        film_by_director_action($filtered['id']);
        break;

    //// ACTEUR

    case "actor_list":
        actor_list_action();
        break;

    case "actor_by_genre":
        actor_by_genre_action($filtered['id']);
        break;

    case "actor_by_film":
        actor_by_film_action($filtered['id']);
        break;

    case "actor_by_director":
        actor_by_director_action($filtered['id']);
        break;

    //// GENRE

    case "genre_list":
        genre_list_action();
        break;

    case "genre_by_film":
        genre_by_film_action($filtered['id']);
        break;

    case "genre_by_actor":
        genre_by_actor_action($filtered['id']);
        break;

    case "genre_by_director":
        genre_by_director_action($filtered['id']);
        break;

    //// REALISATEUR

    case "director_list":
        director_list_action();
        break;

    case "director_by_film":
        director_by_film_action($filtered['id']);
        break;

    case "director_by_actor":
        director_by_actor_action($filtered['id']);
        break;

    case "director_by_genre":
        director_by_genre_action($filtered['id']);
        break;

    //// PERSONNES
    case "people_list":
        people_list_action();
        break;
///////////////////////////////////////////////////   CREATION   ///////////////////////////////////////////////////////

    case "add_film":
        add_film_action($filtered);
        break;

    case "add_people":
        add_people_action($filtered);
        break;

    case "add_actor":
        add_actor_action($filtered, $filtered['film_id']);
        break;

    case "add_genre":
        add_genre_action($filtered);
        break;

    case "add_director":
        add_director_action($filtered, $filtered['film_id']);
        break;

/////////////////////////////////////////////////   MODIFICATION   /////////////////////////////////////////////////////

    case "update_film":
        update_film_action($filtered);
        break;

    case "update_people":
        update_people_action($filtered);
        break;

    case "update_actor":
        update_actor_action($filtered, $filtered['film_id']);
        break;

    case "update_director":
        update_director_action($filtered, $filtered['film_id']);
        break;

    case "update_genre":
        update_genre_action($filtered);
        break;

/////////////////////////////////////////////////   SUPPRESSION   //////////////////////////////////////////////////////

    case "delete_film":
        delete_film_action($filtered['id']);
        break;

    case "delete_people":
        delete_people_action($filtered['id']);
        break;

    case "delete_actor":
        delete_actor_action($filtered['id'], $filtered['film_id']);
        break;

    case "delete_genre":
        delete_genre_action($filtered['id']);
        break;

    case "delete_director":
        delete_director_action($filtered, $filtered['film_id']);
        break;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    default:
        pagenotfound_action();
}

//header("refresh:4;url=controleur.php");
