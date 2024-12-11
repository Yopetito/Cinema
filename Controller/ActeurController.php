<?php
namespace Controller;
use Model\Connect;
use Model\Manager\ActeurManager;

class ActeurController {

    public function listActeurs() {

        $acteurManager = new ActeurManager();
        $acteurs = $acteurManager->getActeurs();

        require "view\listActeurs.php";
    }

    public function detailActeur($id) {
    
        $acteurManager = new ActeurManager();
        $acteurs = $acteurManager->getDetailActeur($id);
        
        $acteurManager = new ActeurManager();
        $castings = $acteurManager->getActeurCasting($id);
        
        require "view\detailActeur.php";
    }
}