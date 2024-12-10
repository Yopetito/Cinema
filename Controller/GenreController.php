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
 }