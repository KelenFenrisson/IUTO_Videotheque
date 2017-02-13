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
    $acteurs = $cont->get_all_acteurs();

    //charger le template
    $template = $twig->loadTemplate('acteurs.html');
    $titre = "Liste des Acteurs ";
    echo $template->render(array(
      'titre'=>$titre,
      'acteurs'=> $acteurs,
    ));
  }catch (Exception $e){
    die('ERROR: '.$e->getMessage());
  }
?>
