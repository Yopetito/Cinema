<?php

namespace Model\Manager;
use Model\Connect;

Class SearchManager {

    public function searchActeurs($keyword) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *
            FROM personne 

            INNER JOIN acteur
            ON personne.id_personne = acteur.id_personne
            
            WHERE personne.nom LIKE :query OR personne.prenom LIKE :query
        ");
        $requete->execute(['query' => "%$keyword%"]);
        $personnes = $requete->fetchAll();
        return $personnes;
    }
    
    public function searchFilms($keyword) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *
            FROM film
            WHERE film.titre_film LIKE :query
        ");
        $requete->execute(['query' => "%$keyword%"]);
        $films = $requete->fetchAll();
        return $films;
    }
    
    
}