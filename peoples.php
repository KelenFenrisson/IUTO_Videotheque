<?php

include 'vendor/autoload.php';


try {
    //indiquer le dossier ou on trouve les templates
    $loader = new Twig_Loader_Filesystem("templates");
    //initialiser l'environement Twig_loader_filesystem
    $twig = new Twig_Environment($loader);

    
    //charger le template
    $template = $twig->loadTemplate('peoples.html');
    $titre = "Liste des Individus ";
    echo $template->render(array(
      'titre'=>$titre,
      'peoples'=> $peoples,
    ));
  }catch (Exception $e){
    die('ERROR: '.$e->getMessage());
  }
?>
