<?php

namespace Model\Manager;
use Model\Connect;

class GenreManager {

    public function getGenres() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT genre.nom_genre
            FROM genre

            ORDER BY genre.nom_genre ASC
        ");

        $genres = $requete->fetchAll();

        return $genres;
    }
}