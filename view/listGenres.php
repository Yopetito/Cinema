<?php 
ob_start(); 

?>

<div class="sectionlist">
    <div class="baniere">
        <p class="titrebaniere">ACTEURS</p>
    </div>
    <div class="btn-ajouter">
    <button onclick="window.location.href='index.php?action=addGenre';">Ajouter un genre</button>
    </div>
    <div class="sectionaffiche">
    <?php
       foreach($genres as $genre) { ?>
            <div class="affiche">
                <a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><img src="<?= $genre["affiche_genre"] ?>" alt=""></a>
                <div class="description">
                    <p><?= $genre["nom_genre"] ?></p>
                </div>
            </div>
    <?php } ?>
    </div>
</div>

<?php
$titre = "Liste des Genres";
$contenu = ob_get_clean();
require "template.php";
?>