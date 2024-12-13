<?php
ob_start();

if(!empty($films)) { ?>
    <div class="baniere">
        <h2>Dans ce genre:</h2>
    </div>
    <div class="sectionaffiche">
    <?php foreach($films as $film) { ?>
        <div class="afficheDetail">
            <div class="description">
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><img src="<?= $film["affiche_film"] ?>" alt=""></a></td>
                <p><?= $film["dateSortie"] ?></p>
            </div>
        </div>
            <?php } ?>
    </div>
<?php
    $titre = $film["nom_genre"];
} else {
    $titre = "Liste de films";
    ?> <h2>Pas de genre trouvé</h2> <?php
}
$contenu = ob_get_clean();
require "template.php";
?>