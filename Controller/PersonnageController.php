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

 }