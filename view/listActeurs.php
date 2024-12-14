<?php 
ob_start(); 

?>
<div class="logo_responsive">
    <img src="public/img/logo_cinelan.png" alt="">
</div>
<div class="list_container">
    <div class="baniere">
        <p class="titrebaniere">ACTEURS</p>
    </div>
    <div class="btn-ajouter">
        <button onclick="window.location.href='index.php?action=addActeur';">Ajouter un acteur</button>
    </div>
    <div class="list_affiche">
    <?php
       foreach($acteurs as $acteur) { ?>
            <div class="list_content">
                <a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><img src="<?= $acteur["affiche_personne"] ?>" alt=""></a>
                <div class="description">
                    <p><?= $acteur["nom_prenom"] ?></p>
                </div>
            </div>
    <?php } ?>
    </div>
</div>


<?php

$titre = "Liste des acteurs";
$contenu = ob_get_clean();
require "template.php";
?>