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

        $FilmManager = new FilmManager();
        $films = $FilmManager->getDetailFilms($id);
        $castings = $FilmManager->getFilmCasting($id);
        $genres = $FilmManager->getGenreFilms($id);


        require "view/detailFilm.php";
    }

    public function addFilm() {
        $filmDetailManager = new FilmManager();
        $realisateurs = $filmDetailManager->getRealisateurs();
        $genres = $filmDetailManager->getGenres();

        if(isset($_POST['submit'])){
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $dateDeSortie = filter_input(INPUT_POST, "dateDeSortie", FILTER_SANITIZE_STRING);   //filter_validate_regex à verifié
            $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);                    // que int
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_STRING);
            $realisateur = filter_input(INPUT_POST, "id_realisateur", FILTER_SANITIZE_STRING);
            $afficheFilm = filter_input(INPUT_POST, "affiche_film", FILTER_VALIDATE_URL);
            $genre = filter_input(INPUT_POST, "id_genre", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            

            if($titre && $dateDeSortie && $duree && $synopsis && $realisateur && $afficheFilm && $genre) {
                $titre = $_POST['titre'];
                $dateDeSortie = $_POST['dateDeSortie'];
                $duree = $_POST['duree'];
                $synopsis = $_POST['synopsis'];
                $realisateur = $_POST['id_realisateur'];
                $afficheFilm = $_POST['affiche_film'];
                $genre = $_POST['id_genre'];
                

                $filmManager = new FilmManager();
                $filmManager->insertFilm($titre, $dateDeSortie, $duree, $synopsis, $realisateur, $afficheFilm, $genre);
            }
            header("Location: index.php?action=listFilms");
        }
        require "view/addFilm.php";
    }
}
