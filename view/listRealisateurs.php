<?php 
ob_start(); 

?>

<div class="sectionlist">
    <div class="baniere">
        <p class="titrebaniere">ACTEURS</p>
    </div>
    <div class="btn-ajouter">
        <button onclick="window.location.href='index.php?action=addRealisateur';">Ajouter un realisateur (NON FONCTIONNEL)</button>
    </div>
    <div class="sectionaffiche">
    <?php
        foreach($realisateurs as $realisateur) { ?>
            <div class="affiche">
                <a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"] ?>"><img src="<?= $realisateur["affiche_personne"] ?>" alt=""></a>
                <div class="description">
                    <p><?= $realisateur["nomprenom"] ?></p>
                </div>
            </div>
    <?php } ?>
    </div>
</div>

<?php

$titre = "Liste des realisateurs";
$contenu = ob_get_clean();
require "template.php";
?>