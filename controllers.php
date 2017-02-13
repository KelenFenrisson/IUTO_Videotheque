<?php

include 'models/recherche.php';

function index_action()
{
    require('accueil.php');
}

// GESTION DES FILMS

function film_list_action()
{
    $recherche = new Recherche();
    $films = $recherche->get_all_films();
    require('films.php');
}

function film_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $films = $recherche->films_par_acteurs($actor_id);
    require('films.php');
}

function film_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $films = $recherche->films_par_genre($genre_id);
    require('films.php');
}

function add_film_action($film)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_film($film);
    require('films.php');
}

function edit_film_action($film)
{
    $recherche = new Recherche();
    $est_edite = $recherche->modif_film($film);
    require('films.php');
}

function delete_film_action($film_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_film($film_id);
    require('films.php');
}



// GESTION DES ACTEURS

function actor_list_action()
{
    $recherche = new Recherche();
    $acteurs = $recherche->get_all_acteurs();
    require('acteurs.php');
}

function actor_by_film_action($film_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_film($film_id);
    require('acteurs.php');
}

function actor_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_genre($genre_id);
    require('acteurs.php');
}

function add_actor_action($acteur)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_acteur($acteur);
    require('acteurs.php');
}

function edit_actor_action($acteur)
{
    $recherche = new Recherche();
    $est_edite = $recherche->modif_acteur($acteur);
    require('acteurs.php');
}

function delete_actor_action($acteur_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_acteur($acteur_id);
    require('acteurs.php');
}

// GESTION DES GENRES

function genre_list_action()
{
    $recherche = new Recherche();
    $genres = $recherche->get_all_genres();
    require('genres.php');
}

function genre_by_film_action($film_id)
{
    $recherche = new Recherche();
    $genres = $recherche->genres_par_film($film_id);
    require('genres.php');
}

function genre_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $genres = $recherche->genres_par_acteur($actor_id);
    require('genres.php');
}

function add_genre_action($genre)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_genre($genre);
    require('genres.php');
}

function edit_genre_action($genre)
{
    $recherche = new Recherche();
    $est_edite = $recherche->modif_genre($genre);
    require('genres.php');
}

function delete_genre_action($genre_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_genre($genre_id);
    require('genres.php');
}

?>
