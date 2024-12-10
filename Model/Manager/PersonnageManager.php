<?php

namespace Model\Manager;
use Model\Connect;

class PersonnageManager {

    public function getPersonnages() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT personnage.nom_personnage
            FROM personnage
        ");

        $personnages = $requete->fetchAll();

        return $personnages;
    }
}