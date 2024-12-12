<?php
namespace Controller;
use Model\Connect;
use Model\Manager\AccueilManager;

class AccueilController {

    public function getFilmsAccueil() {
        $accueilManager = new AccueilManager();
        $films = $accueilManager->showFilmsAccueil();
        $acteurs = $accueilManager->showActeursAccueil();
        
        require "view\accueil.php";
    }

}