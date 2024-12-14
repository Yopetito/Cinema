<?php 
ob_start(); 

?>
<div class="logo_responsive">
    <img src="public/img/logo_cinelan.png" alt="">
</div>
<div class="list_container">
    <div class="baniere">
        <p class="titrebaniere">PERSONNAGES</p>
    </div>
    <div class="btn-ajouter">
        <button onclick="window.location.href='index.php?action=addPersonnage';">Ajouter un acteur (NON FONCTIONNEL)</button>
    </div>
    <div class="list_affiche">
    <?php
       foreach($personnages as $personnage) { ?>    
            <div class="list_content">
                <a href="index.php?action=detailPersonnage&id=<?= $personnage["id_personnage"] ?>"><img src="<?= $personnage["affiche_personnage"] ?>" alt=""></a>
                <div class="description">
                    <p><?= $personnage["nom_personnage"] ?></p>
                </div>
            </div>
    <?php } ?>
    </div>
</div>

<?php

$titre = "Liste des Personnages";
$contenu = ob_get_clean();
require "template.php";
?>