<?php

namespace Model\Manager;
use Model\Connect;

Class ActeurManager {

    public function getActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT a.id_acteur, 
            CONCAT(p.nom, ' ', p.prenom) AS nom_prenom
            FROM personne p

            INNER JOIN acteur a
            ON p.id_personne = a.id_personne

            ORDER BY p.nom ASC
        ");
        $acteurs = $requete->fetchAll();

        return $acteurs;
    }

    public function getDetailActeur($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailActeur = $pdo->prepare("
            SELECT acteur.id_acteur, 
            CONCAT(p.prenom, ' ', p.nom) AS nomprenom,
            p.sexe,
            p.dateNaissance
            FROM personne p

            INNER JOIN acteur
            ON p.id_personne = acteur.id_personne

            WHERE acteur.id_acteur = :id
        ");
        $requeteDetailActeur->execute(["id" => $id]);
        $acteurs = $requeteDetailActeur->fetchAll();
        return $acteurs;
    }

    public function getActeurCasting($id) {
        $pdo = Connect::seConnecter();
        $requeteCastingActeur = $pdo->prepare("
            SELECT acteur.id_acteur, 
            film.titre_film,
            personnage.nom_personnage
            FROM casting

            INNER JOIN film
            ON casting.id_film = film.id_film

            INNER JOIN personnage
            ON casting.id_personnage = personnage.id_personnage

            INNER JOIN acteur
            ON casting.id_acteur = acteur.id_acteur
            
            WHERE acteur.id_acteur = :id
        ");
        $requeteCastingActeur->execute(["id" => $id]);
        $castings = $requeteCastingActeur->fetchAll();
        return $castings;
    }

}