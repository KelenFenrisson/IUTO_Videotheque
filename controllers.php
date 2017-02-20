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
function film_list_action($msg="")
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
    $films = $recherche->films_par_realisateur($director_id);
    require('films.php');
}

/**********************************************************************************************************************/

// Contrôle liste de tous les acteurs
function actor_list_action($msg="")
{
    $recherche = new Recherche();
    $acteurs = $recherche->get_all_acteurs();
    $films = $recherche->get_all_films();
    require('acteurs.php');
}

// Contrôle acteurs en fonction d'un film
function actor_by_film_action($film_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_film($film_id);
    $films = $recherche->get_all_films();
    require('acteurs.php');
}

// Contrôle acteurs en fonction d'un genre
function actor_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_genre($genre_id);
    $films = $recherche->get_all_films();
    require('acteurs.php');
}

// Contrôle acteurs en fonction d'un realisateur
function actor_by_director_action($director_id)
{
    $recherche = new Recherche();
    $acteurs = $recherche->acteurs_par_realisateurs($director_id);
    $films = $recherche->get_all_films();
    require('acteurs.php');
}

/**********************************************************************************************************************/

// Contrôle liste de tous les genres
function genre_list_action($msg="")
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
    $genres = $recherche->genres_par_realisateur($director_id);
    require('genres.php');
}


/**********************************************************************************************************************/

// Contrôle liste de tous les realisateurs
function director_list_action($msg="")
{
    $recherche = new Recherche();
    $realisateurs = $recherche->get_all_realisateurs();
    $films = $recherche->get_all_films();
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un film
function director_by_film_action($film_id)
{
    $recherche = new Recherche();
    $realisateurs = $recherche->realisateurs_par_film($film_id);
    $films = $recherche->get_all_films();
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un acteur
function director_by_actor_action($actor_id)
{
    $recherche = new Recherche();
    $realisateurs = $recherche->realisateurs_par_acteur($actor_id);
    $films = $recherche->get_all_films();
    require('realisateurs.php');
}

// Contrôle realisateurs en fonction d'un realisateur
function director_by_genre_action($genre_id)
{
    $recherche = new Recherche();
    $realisateurs = $recherche->realisateurs_par_genre($genre_id);
    $films = $recherche->get_all_films();
    require('realisateurs.php');
}

/**********************************************************************************************************************/
// Contrôle lister toutes les personnes
function people_list_action($msg="")
{
    $recherche = new Recherche();
    $peoples = $recherche->get_all_individus();
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
    $msg="Suite à une erreur, l'ajout du film n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_ajoute = $recherche->ajout_film($film_info);
    if($est_ajoute){$msg="Le film a bien été ajouté. Merci de votre contribution.";}
    film_list_action($msg);
}

// Ajout d'un individu
function add_people_action($people_info)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, l'ajout de la star n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_ajoute = $recherche->ajout_individu($people_info);
    if($est_ajoute){$msg="La star a bien été ajoutée. Merci de votre contribution.";}
    people_list_action($msg);
}

// Ajout d'un acteur
function add_actor_action($actor_info, $film_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, l'ajout de la participation de cet acteur à ce film n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_ajoute = $recherche->ajout_acteur($actor_info, $film_id);
    if($est_ajoute){$msg="La participation de cet acteur au film a bien été ajoutée. Merci de votre contribution.";}
    actor_list_action($msg);
}

// Ajout d'un realisateur
function add_director_action($director_info, $film_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, l'ajout de la realisation du film par ce realisateur n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_ajoute = $recherche->ajout_realisateur($director_info, $film_id);
    if($est_ajoute){$msg="Ce réalisateur a bien été associé au film. Merci de votre contribution.";}
    director_list_action($msg);
}

// Ajout d'un genre
function add_genre_action($genre_info)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, l'ajout de cette categorie n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_ajoute = $recherche->ajout_genre($genre_info);
    if($est_ajoute){$msg="La catégorie a bien été ajoutée. Merci de votre contribution.";}
    genre_list_action($msg);
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
    $msg="Suite à une erreur, la mise à jour des informations du film n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_modifie = $recherche->modif_film($film_info);
    if($est_modifie){$msg="Les informations au sujet de ce film ont bien été modifiées. Merci de votre contribution.";}
    film_list_action($msg);
}

// modif d'un individu
function update_people_action($people_info)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la mise à jour des informations de la personne n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_modifie = $recherche->modif_individu($people_info);
    if($est_modifie){$msg="Les informations au sujet de cette personne ont bien été modifiées. Merci de votre contribution.";}
    people_list_action($msg);
}

// modif d'un acteur
function update_actor_action($actor_info, $film_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la mise à jour des informations de cet acteur n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_modifie = $recherche->modif_acteur($actor_info, $film_id);
    if($est_modifie){$msg="Les informations au sujet de cet acteur ont bien été modifiées. Merci de votre contribution.";}
    actor_list_action($msg);
}

// modif d'un realisateur
function update_director_action($director_info, $film_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la mise à jour des informations de ce realisateur n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_modifie = $recherche->modif_realisateur($director_info, $film_id);
    if($est_modifie){$msg="Les informations au sujet de ce realisateur ont bien été modifiées. Merci de votre contribution.";}
    director_list_action($msg);
}

// modif d'un genre
function update_genre_action($genre_info)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la mise à jour des informations de cette catégorie n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_modifie = $recherche->modif_genre($genre_info);
    if($est_modifie){$msg="Les informations au sujet de cette catégorie ont bien été modifiées. Merci de votre contribution.";}
    genre_list_action($msg);
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
    $msg="Suite à une erreur, la suppression du film n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_efface = $recherche->suppr_film($film_id);
    if($est_efface){$msg="La suppression du film a bien été effectuée. Merci de votre contribution.";}
    film_list_action($msg);
}

// suppr d'un individu
function delete_people_action($people_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la suppression de l'individu n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_efface = $recherche->suppr_individu($people_id);
    if($est_efface){$msg="La suppression de la personne a bien été effectuée. Merci de votre contribution.";}
    people_list_action($msg);
}

// suppr d'un acteur
function delete_actor_action($actor_id, $film_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la suppression de l'acteur n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_efface = $recherche->suppr_acteur($actor_id, $film_id);
    if($est_efface){$msg="La suppression de l'acteur a bien été effectuée. Merci de votre contribution.";}
    actor_list_action($msg);
}

// suppr d'un realisateur
function delete_director_action($director_id, $film_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la suppression du realisateur n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_efface = $recherche->suppr_realisateur($director_id, $film_id);
    if($est_efface){$msg="La suppression du réalisateur a bien été effectuée. Merci de votre contribution.";}
    director_list_action($msg);
}

// suppr d'un genre
function delete_genre_action($genre_id)
{
    $recherche = new Recherche();
    $msg="Suite à une erreur, la suppression de la catégorie n'a pas pu se faire. Veuillez contacter un administrateur";
    $est_efface = $recherche->suppr_genre($genre_id);
    if($est_efface){$msg="La suppression de la catégorie a bien été effectuée. Merci de votre contribution.";}
    genre_list_action($msg);
}

?>
