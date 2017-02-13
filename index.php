<?php

include 'controllers.php';
// on lit une action en parametre
// par defaut, 'list'
$action = $_GET['action'] ?? 'index';
$message="";

switch ($action) {
    // Par defaut on emmene sur l'index
    case "index":
        index_action();
        break;

    // On demande la liste de tous les films
    case "film_list":
        film_list_action();
        break;

    // On demande la liste de tous les acteurs
    case "actor_list":
        actor_list_action();
        break;

    // On demande la liste de tous les genres
    case "genre_list":
        genre_list_action();
        break;

    // On demande une recherche de film avec un acteur particulier
    case "film_by_actor":
        film_by_actor_action($_GET['id']);
        break;

    // On demande une recherche film appartenant a un genre particulier
    case "film_by_genre":
        film_by_genre_action($_GET['id']);
        break;

    // On demande des acteurs jouant un certain genre
    case "actor_by_genre":
        actor_by_genre_action($_GET['id']);
        break;

    case "actor_by_film":
        actor_by_film_action($_GET['id']);
        break;

    default:
        index_action();
}

//header("refresh:4;url=controleur.php");
