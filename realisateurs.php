<?php

include 'vendor/autoload.php';


try {
    //indiquer le dossier ou on trouve les templates
    $loader = new Twig_Loader_Filesystem("templates");
    //initialiser l'environement Twig_loader_filesystem
    $twig = new Twig_Environment($loader);

    
    //charger le template
    $template = $twig->loadTemplate('realisateurs.html');
    $titre = "Liste des Realisateurs ";
    echo $template->render(array(
      'titre'=>$titre,
      'realisateurs'=> $realisateurs,
    ));
  }catch (Exception $e){
    die('ERROR: '.$e->getMessage());
  }
?>
