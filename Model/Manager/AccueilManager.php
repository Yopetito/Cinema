<?php
namespace Model\Manager;
use Model\Connect;

class AccueilManager {

    public function showFilmsAccueil() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT f.id_film, f.titre_film, f.affiche_film
            FROM film f

            ORDER BY f.id_film DESC

            LIMIT 4
        ");

        $films = $requete->fetchAll();

        return $films;
    }
    
    public function showActeursAccueil() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT CONCAT(p.prenom, ' ', p.nom) AS nomprenom,
                p.id_personne,
                a.id_acteur,
                p.affiche_personne
            FROM personne p

            INNER JOIN acteur a
            ON p.id_personne = a.id_personne

            LIMIT 4
        ");

        $acteurs = $requete->fetchAll();

        return $acteurs;
    }

}