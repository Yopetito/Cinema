<?php

namespace Model\Manager;
use Model\Connect;

class GenreManager {

    public function getGenres() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT genre.id_genre, genre.nom_genre
            FROM genre

            ORDER BY genre.nom_genre ASC
        ");

        $genres = $requete->fetchAll();

        return $genres;
    }

    public function getGenreFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteGenreFilm = $pdo->prepare("
            SELECT g.id_genre, g.nom_genre, film.titre_film, film.id_film
            FROM genre g

            INNER JOIN film_genre
            ON g.id_genre = film_genre.id_genre

            INNER JOIN film
            ON film_genre.id_film = film.id_film

            WHERE g.id_genre = :id 
        ");
        $requeteGenreFilm->execute(["id" => $id]);
        $films = $requeteGenreFilm->fetchAll();
        return $films;
    }
}