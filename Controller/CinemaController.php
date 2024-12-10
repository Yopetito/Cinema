<?php 
namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT titre_film, dateDeSortie_film
            FROM film
        ");

        require "view\listFilms.php";
    }
}
