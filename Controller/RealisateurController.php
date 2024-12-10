<?php
namespace Controller;
use Model\Connect;
use Model\Manager\RealisateurManager;

class RealisateurController {

    public function listRealisateurs() {

        $realisateurManager = new RealisateurManager();
        $realisateurs = $realisateurManager->getRealisateurs();

        require "view\listRealisateurs.php";
    }
    public function detailRealisateur($id) {
    
        $realisateurManager = new RealisateurManager();
        $realisateurs = $realisateurManager->getDetailRealisateur($id);
        
        $realisateurManager = new RealisateurManager();
        $films = $realisateurManager->getRealisateurFilm($id);
        
        require "view\detailRealisateur.php";
    }

}