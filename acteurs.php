<?php

include 'vendor/autoload.php';

include 'recherche.php';

try {
    //indiquer le dossier ou on trouve les templates
    $loader = new Twig_Loader_Filesystem('templates');
    //initialiser l'environement Twig_loader_filesystem
    $twig = new Twig_Environment($loader);

    
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
