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
            COUNT(DISTINCT c.id_film) AS Films,
            p.id_personne,
            a.id_acteur,
            p.affiche_personne
            FROM casting c

            INNER JOIN acteur a
            ON c.id_acteur = a.id_acteur

            INNER JOIN personne p
            ON a.id_personne = p.id_personne

            GROUP BY a.id_acteur

            ORDER BY Films DESC

            LIMIT 4
        ");

        $acteurs = $requete->fetchAll();

        return $acteurs;
    }

}