<?php 
ob_start(); 
?>
<div class="blockfilms">
    <div class="banierefilm">
        <p class="films">FILMS - <?= count($films) ?> En stock!</p>
    </div>
    <div class="btn-ajouter">
        <button onclick="window.location.href='index.php?action=addFilm';">Ajouter un film</button>
    </div>
    <div class="listfilms">
    <?php
        foreach($films as $film) { ?>
            <div class="film">
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><img src="<?= $film["affiche_film"] ?>" alt=""></a>
                <div class="descriptionfilm">
                    <p><?= $film["titre_film"] ?></p>
                    <p><?= $film["Date_de_sortie"] ?></p>
                    <p><?= $film["Duration"] ?></p>
                    <p><?= $film["Createur"] ?></p>
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