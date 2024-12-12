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
        $castings = $detailFilmCasting->getFilmCasting($id);
        $genres = $detailFilmGenre->getGenreFilms($id);


        require "view/detailFilm.php";
    }

    public function addFilm() {
        $filmManager = new FilmManager();
        $realisateurs = $filmManager->getRealisateurs();
        $genres = $filmManager->getGenres();

        if(isset($_POST['submit'])){
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $dateDeSortie = filter_input(INPUT_POST, "dateDeSortie", FILTER_SANITIZE_STRING);   //filter_validate_regex à verifié
            $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);                    // que int
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_STRING);
            $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_SANITIZE_STRING);
            $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_STRING);

            if($titre && $dateDeSortie && $duree && $synopsis && $realisateur && $genre) {
                $titre = $_POST['titre'];
                $dateDeSortie = $_POST['dateDeSortie'];
                $duree = $_POST['duree'];
                $synopsis = $_POST['synopsis'];
                $realisateur = $_POST['id_realisateur'];
                $genre = $_POST['id_genre'];

                $filmManager = new FilmManager();
                $filmManager->insertFilm($titre, $dateDeSortie, $duree, $synopsis, $realisateur, $genre);
            }
            header("Location: index.php?action=listFilms");
        }
        require "view/addFilm.php";
    }
}
