<?php
namespace Controller;
use Model\Connect;
use Model\Manager\FilmManager;


class FilmController {

    public function listFilms() {

        $filmManager = new FilmManager();
        $films = $filmManager->getFilms();

        require "view\listFilms.php";
    }

    public function detailFilm($id) {

        $detailFilmManager = new FilmManager();
        $films = $detailFilmManager->getDetailFilms($id);

        $detailFilmCasting = new FilmManager();
        $castings = $detailFilmCasting->getFilmCasting($id);


        require "view/detailFilm.php";
    }

    public function addFilm() {
        $filmManager = new FilmManager();
        $realisateurs = $filmManager->getRealisateurs();
        $genres = $filmManager->getGenres();

        if(isset($_POST['submit'])){
            $titre = $_POST['titre'];
            $dateDeSortie = $_POST['dateDeSortie'];
            $duree = $_POST['duree'];
            $synopsis = $_POST['synopsis'];
            $realisateur = $_POST['id_realisateur'];
            $genre = $_POST['id_genre'];

            $filmManager = new FilmManager();
            $filmManager->insertFilm($titre, $dateDeSortie, $duree, $synopsis, $realisateur, $genre);
            header("Location: index.php?action=listFilms");
        }
        require "view/addFilm.php";
    }
}
