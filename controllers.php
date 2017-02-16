<?php

include 'models/recherche.php';


/* *********************************************************************************************************************
 * CONTROLEURS
 *
 * -- GENERIQUES
 *
 * index_action()
 * pagenotfound_action()
 *
 * -- CONSULTATION
 *
 * film_list_action()
 * film_by_actor_action($actor_id)
 * film_by_genre_action($genre_id)
 * film_by_director_action($director_id)
 * 
 * actor_list_action()
 * actor_by_film_action($film_id)
 * actor_by_genre_action($genre_id)
 * actor_by_director_action($director_id)
 * 
 * genre_list_action()
 * genre_by_film_action($film_id)
 * genre_by_actor_action($actor_id)
 * genre_by_director_action($director_id)
 * 
 * director_list_action()
 * director_by_film_action($film_id)
 * director_by_actor_action($actor_id)
 * director_by_genre_action($genre_id)
 *
 *
 * -- CREATION
 * 
 * add_film_action()
 * add_actor_action()
 * add_genre_action()
 * add_director_action()
 * add_person_action()
 *
 *
 * -- MISE A JOUR
 * 
 * update_film_action()
 * update_actor_action()
 * update_genre_action()
 * update_director_action()
 * update_person_action()
 *
 *
 * -- SUPPRESSION
 *
 * delete_film_action()
 * delete_actor_action()
 * delete_genre_action()
 * delete_director_action()
 * delete_person_action()
 *
 * ********************************************************************************************************************/



/***********************************************************************************************************************
 * GENERIQUES
 *
 * index_action()
 *
 * pagenotfound_action()
 *
 * ********************************************************************************************************************/




// Contrôle index
function index_action()
{
    require('accueil.php');
}

// Contrôle page erreur 404 => si aucune action ne correspond
function pagenotfound_action()
{
    require('error404.php');
}

/***********************************************************************************************************************
 * -- CONSULTATION
 *
 * film_list_action()
 * film_by_actor_action($actor_id)
 * film_by_genre_action($genre_id)
 * film_by_director_action($director_id)
 *
 * actor_list_action()
 * actor_by_film_action($film_id)
 * actor_by_genre_action($genre_id)
 * actor_by_director_action($director_id)
 *
 * genre_list_action()
 * genre_by_film_action($film_id)
 * genre_by_actor_action($actor_id)
 * genre_by_director_action($director_id)
 *
 * director_list_action()
 * director_by_film_action($film_id)
 * director_by_actor_action($actor_id)
 * director_by_genre_action($genre_id)
 *
 * people_list_action()
 * ********************************************************************************************************************/

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

// Contrôle film en fonction d'un genre
function film_by_director_action($director_id)
{
    $recherche = new Recherche();
    $films = $recherche->films_par_genre($director_id);
    require('films.php');
}

/**********************************************************************************************************************/

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
    $acteurs = $recherche->acteurs_par_realisateurs($genre_id);
    require('acteurs.php');
}

// Contrôle acteurs en fonction d'un realisateur
function actor_by_director_action($director_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_realisateurs($director_id);
    require('acteurs.php');
}

/**********************************************************************************************************************/

// Contrôle liste de tous les genres
function genre_list_action()
{
    $recherche = new Recherche();
    $genres = $recherche->get_all_genres();
    require('genres.php');
}

// Contrôle genres en fonction d'un film
function genre_by_film_action($film_id)
{
    $recherche = new Recherche();
    $genres = $recherche->genres_par_film($film_id);
    require('genres.php');
}

// Contrôle genres en fonction d'un acteur
function genre_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $genres = $recherche->genres_par_acteur($actor_id);
    require('genres.php');
}

// Contrôle genres en fonction d'un realisateur
function genre_by_director_action($director_id)
{
    $recherche = new Recherche();
    $genres = $recherche->acteurs_par_realisateurs($director_id);
    require('genres.php');
}


/**********************************************************************************************************************/

// Contrôle liste de tous les realisateurs
function director_list_action()
{
    $recherche = new Recherche();
    $realisateurs = $recherche->get_all_realisateurs();
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un film
function director_by_film_action($film_id)
{
    $recherche = new Recherche();
    $realisateurs = $recherche->realisateurs_par_film($film_id);
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un acteur
function director_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $realisateurs = $recherche->realisateurs_par_acteur($actor_id);
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un realisateur
function director_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $realisateurs = $recherche->realisateurs_par_genre($genre_id);
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un realisateur
function people_list_action($people_id)
{
    $recherche = new Recherche();
    $people = $recherche->realisateurs_par_genre($people_id);
    require('peoples.php');
}

/***********************************************************************************************************************
 * AJOUTS
 *
 * add_film_action($film_info)
 * add_person_action($people_info)
 * add_actor_action($actor_info)
 * add_director_action($director_info)
 * add_genre_action($genre_info)
 *
 * *******************************************************************************************************************
 * @param $film_info
 */

// Ajout d'un film
function add_film_action($film_info)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_film($film_info);
    require('films.php');
}

// Ajout d'un individu
function add_person_action($people_info)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_individu($people_info);
    require('peoples.php');
}

// Ajout d'un acteur
function add_actor_action($actor_info, $film_id)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_acteur($actor_info, $film_id);
    require('acteurs.php');
}

// Ajout d'un realisateur
function add_director_action($director_info, $film_id)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_realisateur($director_info, $film_id);
    require('realisateurs.php');
}

// Ajout d'un genre
function add_genre_action($genre_info)
{
    $recherche = new Recherche();
    $est_ajoute = $recherche->ajout_genre($genre_info);
    require('genres.php');
}


/***********************************************************************************************************************
 * MODIFICATIONS
 *
 * update_film_action($film_info)
 * update_person_action($people_info)
 * update_actor_action($actor_info)
 * update_director_action($director_info)
 * update_genre_action($genre_info)
 *
 * *******************************************************************************************************************
 * @param $film_info
 */

// modif d'un film
function update_film_action($film_info)
{
    $recherche = new Recherche();
    $est_modifie = $recherche->modif_film($film_info);
    require('films.php');
}

// modif d'un individu
function update_person_action($people_info)
{
    $recherche = new Recherche();
    $est_modifie = $recherche->modif_individu($people_info);
    require('peoples.php');
}

// modif d'un acteur
function update_actor_action($actor_info, $film_id)
{
    $recherche = new Recherche();
    $est_modifie = $recherche->modif_acteur($actor_info, $film_id);
    require('acteurs.php');
}

// modif d'un realisateur
function update_director_action($director_info, $film_id)
{
    $recherche = new Recherche();
    $est_modifie = $recherche->modif_realisateur($director_info, $film_id);
    require('realisateurs.php');
}

// modif d'un genre
function update_genre_action($genre_info)
{
    $recherche = new Recherche();
    $est_modifie = $recherche->modif_genre($genre_info);
    require('genres.php');
}


/***********************************************************************************************************************
 * SUPPRESSIONS
 *
 * delete_film_action($film_info)
 * delete_person_action($people_info)
 * delete_actor_action($actor_info)
 * delete_director_action($director_info)
 * delete_genre_action($genre_info)
 *
 * *******************************************************************************************************************
 * @param $film_id
 */

// suppr d'un film
function delete_film_action($film_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_film($film_id);
    require('films.php');
}

// suppr d'un individu
function delete_person_action($people_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_individu($people_id);
    require('peoples.php');
}

// suppr d'un acteur
function delete_actor_action($actor_id, $film_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_acteur($actor_id, $film_id);
    require('acteurs.php');
}

// suppr d'un realisateur
function delete_director_action($director_id, $film_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_realisateur($director_id, $film_id);
    require('realisateurs.php');
}

// suppr d'un genre
function delete_genre_action($genre_id)
{
    $recherche = new Recherche();
    $est_efface = $recherche->suppr_genre($genre_id);
    require('genres.php');
}

?>
