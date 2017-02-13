<?php

include 'vendor/autoload.php';

include 'recherche.php';

try {
    //indiquer le dossier ou on trouve les templates
    $loader = new Twig_Loader_Filesystem('templates');
    //initialiser l'environement Twig_loader_filesystem
    $twig = new Twig_Environment($loader);

    //recupérer les données depuis la base
    $cont = new Recherche();
    $films = $cont->get_all_films();

    //charger le template
    $template = $twig->loadTemplate('films.html');
    $titre = "Liste des films ";
    echo $template->render(array(
      'titre'=>$titre,
      'films'=> $films,
    ));
  }catch (Exception $e){
    die('ERROR: '.$e->getMessage());
  }
?>
