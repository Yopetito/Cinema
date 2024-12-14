<?php
ob_start();


use Controller\FilmController;
use Controller\ActeurController;
use Controller\RealisateurController;
use Controller\GenreController;
use Controller\PersonnageController;
use Controller\AccueilController;


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlRealisateur = new RealisateurController();
$ctrlGenre = new GenreController;
$ctrlPersonnage = new PersonnageController();
$ctrlAccueil = new AccueilController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "accueil" : $ctrlAccueil->getFilmsAccueil(); break;
        case "listFilms" : $ctrlFilm->listFilms(); break;
        case "listActeurs" : $ctrlActeur->listActeurs(); break;
        case "listRealisateurs" : $ctrlRealisateur->listRealisateurs(); break;
        case "listGenres" : $ctrlGenre->listGenres(); break;
        case "listPersonnages" : $ctrlPersonnage->listPersonnages(); break;
        case "detailFilm" : $ctrlFilm->detailFilm($id); break;
        case "detailActeur" : $ctrlActeur->detailActeur($id); break;
        case "detailRealisateur" : $ctrlRealisateur->detailRealisateur($id); break;
        case "detailPersonnage" : $ctrlPersonnage->detailPersonnage($id); break;
        case "detailGenre" : $ctrlGenre->detailGenre($id); break;
        case "addGenre" : $ctrlGenre->addGenre(); break;
        case "addActeur" : $ctrlActeur->addActeur(); break;
        case "addFilm" : $ctrlFilm->addFilm(); break;
        case "deleteActeur" : $ctrlActeur->deleteActeur(); break;
    }
} else {
    $ctrlAccueil->getFilmsAccueil();
}

?>