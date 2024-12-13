<?php

namespace Model\Manager;
use Model\Connect;

class FilmManager {

    public function getFilms() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.id_film, f.titre_film, 
	        DATE_FORMAT(f.dateDeSortie_film, '%d/%m/%Y') AS Date_de_sortie,
	        DATE_FORMAT(SEC_TO_TIME(f.duree_film * 60),'%Hh%i') AS Duration,
	        CONCAT(p.prenom, ' ', p.nom) AS Createur,
            f.affiche_film
            FROM film f

            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur

            INNER JOIN personne p
            ON r.id_personne = p.id_personne

            ORDER BY f.dateDeSortie_film DESC
        ");
        $films = $requete->fetchAll();

        return $films;
    }

    // =============== DetailFilm.php===============================

    public function getDetailFilms($id) {
        $pdo = Connect::seConnecter();
        $requeteInfoFilm = $pdo->prepare("
            SELECT realisateur.id_realisateur,
            f.titre_film,
            f.affiche_film,
            f.synopsis_film,
            DATE_FORMAT(f.dateDeSortie_film, '%d/%m/%Y') AS dateSortie, 
            DATE_FORMAT(SEC_TO_TIME(f.duree_film * 60), '%Hh%i') AS duree, 
            CONCAT(p.nom, ' ', p.prenom) AS realisateur,
            p.affiche_personne
            FROM film f

            INNER JOIN realisateur
            ON f.id_realisateur = realisateur.id_realisateur

            INNER JOIN personne p
            ON realisateur.id_personne = p.id_personne
            
            WHERE f.id_film = :id
        ");
        $requeteInfoFilm->execute(["id" => $id]);
        $films = $requeteInfoFilm->fetchAll();
        return $films;
    }

    public function getGenreFilms($id) {
        $pdo = Connect::seConnecter();
        $requeteFilmGenre = $pdo->prepare("
            SELECT f.id_film,
            genre.id_genre,
            genre.nom_genre
            FROM genre
            INNER JOIN film_genre ON genre.id_genre = film_genre.id_genre
            INNER JOIN film f ON film_genre.id_film = f.id_film            
        
            WHERE f.id_film = :id
        
        ");
        $requeteFilmGenre->execute(["id" => $id]);
        $genres = $requeteFilmGenre->fetchAll();
        return $genres;
    }

    public function getFilmCasting($id) {
        $pdo = Connect::seConnecter();
        $requeteCasting = $pdo->prepare("
            SELECT a.id_acteur,
            p.affiche_personne,
            personnage.id_personnage, 
            CONCAT(p.prenom, ' ', p.nom) AS nomprenom,
            personnage.nom_personnage,
            personnage.affiche_personnage
            FROM film f

            INNER JOIN casting c
            ON f.id_film = c.id_film

            INNER JOIN personnage
            ON c.id_personnage = personnage.id_personnage

            INNER JOIN acteur a
            ON c.id_acteur = a.id_acteur

            INNER JOIN personne p
            ON a.id_personne = p.id_personne

            WHERE f.id_film = :id

            ORDER BY nomprenom ASC
        ");
        $requeteCasting->execute(["id" => $id]);
        $castings = $requeteCasting->fetchAll();

        return $castings;
    }

    // ===================AddFilm.php========================

    public function getRealisateurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT r.id_realisateur, 
            CONCAT(p.prenom, ' ', p.nom) AS nomprenom
            FROM personne p

            INNER JOIN realisateur r
            ON p.id_personne = r.id_personne

            ORDER BY p.nom ASC
        ");

        $realisateurs = $requete->fetchAll();

        return $realisateurs;
    }

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

    public function insertFilm($titre, $dateDeSortie, $duree, $synopsis, $realisateur, $afficheFilm, $genres) {
        $pdo = Connect::seConnecter();
        $requeteFilmInfos = $pdo->prepare("
        INSERT INTO film (titre_film, dateDeSortie_film, duree_film, synopsis_film, id_realisateur, affiche_film)
        VALUES (:titre, :dateDeSortie, :duree, :synopsis, :id_realisateur, :afficheFilm)
        ");
        $requeteFilmInfos->execute([
            "titre" => $titre,
            "dateDeSortie" => $dateDeSortie,
            "duree" => $duree,
            "synopsis" => $synopsis,
            "id_realisateur" => $realisateur,
            "afficheFilm" => $afficheFilm
        ]);
        $lastIdFilm = $pdo->lastInsertId();

        $requeteAddGenre = $pdo->prepare("
            INSERT INTO film_genre (id_film, id_genre)
            VALUES (:id_film, :id_genre)
        ");
        foreach ($genres as $id_genre) {
            $requeteAddGenre->execute([
                "id_film" => $lastIdFilm,
                "id_genre" => $id_genre
            ]);
        }
    }
}
