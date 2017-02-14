<?php

include 'models/recherche.php';




// Contrôle page erreur 404 => si aucune action ne correspond
function pagenotfound_action()
{
    require('error404.php');
}

// Contrôle index
function index_action()
{
    require('accueil.php');
}

// GESTION DES FILMS

// Contrôle liste de tous les films
function film_list_action()
{
    $recherche = new Recherche();
    $films = $recherche->get_all_films();
    require('films.php');
}

// Contrôle film en fonction d'un acteur
function film_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $films = $recherche->films_par_acteurs($actor_id);
    require('films.php');
}

// Contrôle film en fonction d'un genre
function film_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $films = $recherche->films_par_genre($genre_id);
    require('films.php');
}

// Contrôle ajout d'un film
function add_film_action($film)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_film($film);
    require('films.php');
}

// Contrôle modification d'un film
function edit_film_action($film)
{
    $recherche = new Recherche();
    $est_edite = $recherche->modif_film($film);
    require('films.php');
}

// Contrôle suppression d'un film
function delete_film_action($film_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_film($film_id);
    require('films.php');
}



// GESTION DES ACTEURS

// Contrôle liste de tous les acteurs
function actor_list_action()
{
    $recherche = new Recherche();
    $acteurs = $recherche->get_all_acteurs();
    require('acteurs.php');
}

// Contrôle acteurs en fonction d'un film
function actor_by_film_action($film_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_film($film_id);
    require('acteurs.php');
}

// Contrôle acteurs en fonction d'un genre
function actor_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_genre($genre_id);
    require('acteurs.php');
}

// Contrôle ajout d'un acteur
function add_actor_action($acteur)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_acteur($acteur);
    require('acteurs.php');
}

// Contrôle modification d'un acteur
function edit_actor_action($acteur)
{
    $recherche = new Recherche();
    $est_edite = $recherche->modif_acteur($acteur);
    require('acteurs.php');
}

// Contrôle suppression d'un acteur
function delete_actor_action($acteur_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_acteur($acteur_id);
    require('acteurs.php');
}

// GESTION DES GENRES

// Contrôle liste de tous les genres
function genre_list_action()
{
    $recherche = new Recherche();
    $genres = $recherche->get_all_genres();
    require('genres.php');
}

// Contrôle liste des genres en fonction d'un film
function genre_by_film_action($film_id)
{
    $recherche = new Recherche();
    $genres = $recherche->genres_par_film($film_id);
    require('genres.php');
}

// Contrôle liste des genres en fonction d'un acteur
function genre_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $genres = $recherche->genres_par_acteur($actor_id);
    require('genres.php');
}

// Contrôle ajout d'un genre
function add_genre_action($genre)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_genre($genre);
    require('genres.php');
}

// Contrôle modification d'un genre
function edit_genre_action($genre)
{
    $recherche = new Recherche();
    $est_edite = $recherche->modif_genre($genre);
    require('genres.php');
}

// Contrôle suppression d'un genre
function delete_genre_action($genre_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_genre($genre_id);
    require('genres.php');
}

// Contrôle liste de tous les réalisateurs
function director_list_action()
{
    $recherche = new Recherche();
    $acteurs = $recherche->get_all_realisateurs();
    require('acteurs.php');
}

// Contrôle liste de tous les films en noir et blanc
function bnw_list_action()
{
    $recherche = new Recherche();
    $films = $recherche->get_all_noiretblanc();
    require('films.php');
}

// Contrôle liste de tous les films en noir et blanc
function color_list_action()
{
    $recherche = new Recherche();
    $films = $recherche->get_all_couleur();
    require('films.php');
}

?>
