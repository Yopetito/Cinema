<?php
namespace Controller;
use Model\Connect;
use Model\Manager\GenreManager;

class GenreController {

    public function listGenres() {
        $genreManager = new GenreManager();
        $genres = $genreManager->getGenres();

        require "view\listGenres.php";
    }

    public function detailGenre($id) {

        $genreManager = new GenreManager();
        $films = $genreManager->getGenreFilm($id);

        require "view\detailGenre.php";
    }

    public function addGenre() {

        if(isset($_POST["submit"])) {
            $nomGenre = filter_input(INPUT_POST, "nomGenre", FILTER_SANITIZE_STRING);
            if($nomGenre) {
                $nomGenre = $_POST["nomGenre"];
                $genreManager = new GenreManager();
                $genreManager->insertGenre($nomGenre);
            }
            header("Location: index.php?action=listGenres");
        }
        require "view\addGenre.php";
        
    }
}