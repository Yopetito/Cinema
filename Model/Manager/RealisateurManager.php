<?php

namespace Model\Manager;
use Model\Connect;

class RealisateurManager {

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

    public function getDetailRealisateur($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailRealisateur = $pdo->prepare("
            SELECT r.id_realisateur, 
            CONCAT(p.prenom, ' ', p.nom) AS nomprenom,
            p.sexe,
            DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') AS dateNaissance
            FROM personne p

            INNER JOIN realisateur r
            ON p.id_personne = r.id_personne

            WHERE r.id_realisateur = :id
        ");
        $requeteDetailRealisateur->execute(["id" => $id]);
        $realisateurs = $requeteDetailRealisateur->fetchAll();
        return $realisateurs;
    }

    public function getRealisateurFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteRealisateurFilm = $pdo->prepare("
            SELECT r.id_realisateur, 
            f.id_film,
            f.titre_film,
            DATE_FORMAT(f.dateDeSortie_film, '%d/%m/%Y') AS dateSortie
            FROM film f

            INNER JOIN realisateur r
            ON f.id_realisateur = r.id_realisateur

            WHERE r.id_realisateur = :id

            ORDER BY f.titre_film ASC
        ");
        $requeteRealisateurFilm->execute(["id" => $id]);
        $films = $requeteRealisateurFilm->fetchAll();
        return $films;
    }
}