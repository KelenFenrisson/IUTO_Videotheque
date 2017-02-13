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

    // GESTION DES FILMS
    case "film_list":
        film_list_action();
        break;

    case "film_by_actor":
        film_by_actor_action($_GET['id']);
        break;

    case "film_by_genre":
        film_by_genre_action($_GET['id']);
        break;

    case "add_film":
        add_film_action($_GET);
        break;
        
    case "edit_film":
        edit_film_action($_GET);
        break;
        
    case "delete_film":
        delete_film_action($_GET['id']);
        break;
        
    
        
    // GESTION DES ACTEURS
    case "actor_list":
        actor_list_action();
        break;

    case "actor_by_genre":
        actor_by_genre_action($_GET['id']);
        break;

    case "actor_by_film":
        echo 'Acteurs par films';
        actor_by_film_action($_GET['id']);
        break;

    case "add_actor":
        add_actor_action($_GET);
        break;

    case "edit_actor":
        edit_actor_action($_GET);
        break;

    case "delete_actor":
        delete_actor_action($_GET['id']);
        break;

    // GESTION DES GENRES
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
        add_genre_action($_GET);
        break;

    case "edit_genre":
        edit_genre_action($_GET);
        break;

    case "delete_genre":
        delete_genre_action($_GET['id']);
        break;

    default:
        index_action();
}

//header("refresh:4;url=controleur.php");
