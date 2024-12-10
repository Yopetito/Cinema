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
}