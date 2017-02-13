<?php
include 'models/recherche.php';
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 13/02/17
 * Time: 15:16
 */


function index_action()
{
    require('accueil.php');
}

function film_list_action()
{
    $recherche = new Recherche();
    $films = $recherche->get_all_films();
    require('films.php');
}


 function actor_list_action()
{
    $recherche = new Recherche();
    $acteurs = $recherche->get_all_acteurs();
    require('acteurs.php');
}

function genre_list_action()
{
    $recherche = new Recherche();
    $genres = $recherche->get_all_genres();
    require('genres.php');
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

function actor_by_genre_action($genre_id)

{
    $recherche = new Recherche();
    $actors = $recherche->acteurs_par_genre($genre_id);
    require('acteurs.php');
}

function actor_by_film_action($film_id)
{
    $recherche = new Recherche();
    $actors = $recherche->acteurs_par_genre($film_id);
    require('acteurs.php');
}