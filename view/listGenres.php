<?php 
ob_start(); 

?>
<div class="logo_responsive">
    <img src="public/img/logo_cinelan.png" alt="">
</div>
<div class="list_container">
    <div class="baniere">
        <p class="titrebaniere">GENRES</p>
    </div>
    <div class="btn-ajouter">
    <button onclick="window.location.href='index.php?action=addGenre';">Ajouter un genre</button>
    </div>
    <div class="list_affiche">
    <?php
       foreach($genres as $genre) { ?>
            <div class="list_content">
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