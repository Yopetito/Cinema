<?php
namespace Controller;
use Model\Connect;
use Model\Manager\PersonnageManager;

class PersonnageController {
    
    public function listPersonnages() {

        $personnageManager = new PersonnageManager();
        $personnages = $personnageManager->getPersonnages();

        require "view\listPersonnages.php";
    }

    public function detailPersonnage($id) {
         
        $personnageManager = new PersonnageManager();
        $persoFilms = $personnageManager->getPersoFilms($id);
       

        
        require "view\detailPersonnage.php";
    }
}