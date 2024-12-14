<?php 
ob_start(); 
?>
<div class="logo_responsive">
    <img src="public/img/logo_cinelan.png" alt="">
</div>
<div class="list_container">
    <div class="baniere">
        <p class="titrebaniere">FILMS</p>
    </div>

    <div class="btn-ajouter">
        <button onclick="window.location.href='index.php?action=addFilm';">Ajouter un film</button>
    </div>
    <div class="list_affiche">
    <?php
        foreach($films as $film) { ?>
            <div class="list_content">
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><img src="<?= $film["affiche_film"] ?>" alt=""></a>
                <div class="description">
                    <p><?= $film["titre_film"] ?></p>
                    <p><?= $film["Date_de_sortie"] ?></p>
                    <p><?= $film["Duration"] ?></p>
                </div>
            </div>
    <?php } ?>
    </div>
</div>


<?php

$titre = "Liste des films";
$contenu = ob_get_clean();
require "template.php";
?>