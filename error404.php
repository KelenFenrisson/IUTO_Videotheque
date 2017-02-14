<?php

include 'vendor/autoload.php';


try {
    //indiquer le dossier ou on trouve les templates
    $loader = new Twig_Loader_Filesystem('templates');
    //initialiser l'environement Twig_loader_filesystem
    $twig = new Twig_Environment($loader);

    // //recupérer les données depuis la base
    // $cont = new Recherche();
    //
    // $films = $cont->films_par_acteurs();

    //charger le template
    $template = $twig->loadTemplate('error.html');
    $titre = "ERREUR 404 : PAGE NON TROUVEE";
    $image = "templates/img/error404.jpg";
    $error = "404";
    echo $template->render(array(
        'titre'=>$titre,
        'image'=> $image,
        'erreur'=> $error
    ));

}catch (Exception $e){
    die('ERROR: '.$e->getMessage());
}
?>
