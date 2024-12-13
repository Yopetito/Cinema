<?php

namespace Model\Manager;
use Model\Connect;

class PersonnageManager {

    public function getPersonnages() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT personnage.id_personnage, personnage.nom_personnage,
            affiche_personnage
            FROM personnage
        ");

        $personnages = $requete->fetchAll();

        return $personnages;
    }

    public function getPersoFilms($id) {
        $pdo = Connect::seConnecter();
        $requetePersoFilms = $pdo->prepare("
            SELECT personnage.id_personnage, 
            personnage.nom_personnage, 
            film.titre_film, 
            film.id_film,
            acteur.id_acteur,
            CONCAT(personne.prenom, ' ', personne.nom) AS nomprenom
            FROM personnage

            INNER JOIN casting
            ON personnage.id_personnage = casting.id_personnage

            INNER JOIN film
            ON casting.id_film = film.id_film

            INNER JOIN acteur
            ON casting.id_acteur = acteur.id_acteur

            INNER JOIN personne
            ON acteur.id_personne = personne.id_personne

            WHERE personnage.id_personnage = :id
        ");
        $requetePersoFilms->execute(["id" => $id]);
        $persoFilms = $requetePersoFilms->fetchAll();
        return $persoFilms;
    }
}