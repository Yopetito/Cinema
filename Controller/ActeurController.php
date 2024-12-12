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
            $nomActeur = filter_input(INPUT_POST, "nomActeur", FILTER_SANITIZE_STRING);
            $prenomActeur = filter_input(INPUT_POST, "prenomActeur", FILTER_SANITIZE_STRING);
            $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_STRING);
            $dateNaissance = filter_input(INPUT_POST, "dateNaissance", FILTER_SANITIZE_STRING); //filter_validate_regex format (à regardé)
            if($nomActeur && $prenomActeur && $sexe && $dateNaissance) {
                $nomActeur = $_POST["nomActeur"];
                $prenomActeur = $_POST["prenomActeur"];
                $sexe = $_POST["sexe"];
                $dateNaissance = $_POST["dateNaissance"];
                
                $ActeurManager = new ActeurManager();
                $ActeurManager->insertActeur($nomActeur, $prenomActeur, $sexe, $dateNaissance);
            }
            header("Location: index.php?action=listActeurs");
            exit;
        }
        require "view\addActeur.php";

    }
}
