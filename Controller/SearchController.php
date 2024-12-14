<?php 
namespace Controller;
use Model\Connect;
use Model\Manager\SearchManager;

class SearchController {
    public function recherche() {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
    
            $searchManager = new SearchManager();
            $personnes = $searchManager->searchActeurs($search);
            $films = $searchManager->searchFilms($search);
    
            require "view/recherche.php";
        } 
    }
}
