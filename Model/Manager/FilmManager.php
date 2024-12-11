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
	        CONCAT(p.prenom, ' ', p.nom) AS Createur
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

    public function getDetailFilms($id) {
        $pdo = Connect::seConnecter();
        $requeteInfoFilm = $pdo->prepare("
            SELECT realisateur.id_realisateur,
            f.titre_film, 
            DATE_FORMAT(f.dateDeSortie_film, '%d/%m/%Y') AS dateSortie, 
            DATE_FORMAT(SEC_TO_TIME(f.duree_film * 60), '%Hh%i') AS duree, 
            CONCAT(p.nom, ' ', p.prenom) AS realisateur,
            genre.nom_genre,
            genre.id_genre
            FROM film f

            INNER JOIN realisateur
            ON f.id_realisateur = realisateur.id_realisateur

            INNER JOIN personne p
            ON realisateur.id_personne = p.id_personne

            INNER JOIN film_genre
            ON f.id_film = film_genre.id_film

            INNER JOIN genre
            ON film_genre.id_genre = genre.id_genre
            
            WHERE f.id_film = :id
        ");
        $requeteInfoFilm->execute(["id" => $id]);
        $films = $requeteInfoFilm->fetchAll();
        return $films;
    }

    public function getFilmCasting($id) {
        $pdo = Connect::seConnecter();
        $requeteCasting = $pdo->prepare("
            SELECT a.id_acteur,
            personnage.id_personnage, 
            CONCAT(p.prenom, ' ', p.nom) AS nomprenom,
            personnage.nom_personnage
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
}
