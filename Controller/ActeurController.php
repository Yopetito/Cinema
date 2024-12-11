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

    public function addActeur() {

        if(isset($_POST["submit"])) {
            $nomActeur = $_POST["nom"];
            $prenomActeur = $_POST["prenom"];
            $sexe = $_POST["sexe"];
            $dateNaissance = $_POST["dateNaissance"];
            
            $ActeurManager = new ActeurManager();
            $ActeurManager->insertActeur($nomActeur, $prenomActeur, $sexe, $dateNaissance);
            header("Location: index.php?action=listActeurs");
        }
        require "view\addActeur.php";

    }
}
