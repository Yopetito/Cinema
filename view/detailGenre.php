<?php
ob_start();

if(!empty($films)) { 
    $nomgenre = $films[0]['nom_genre']; ?>
    <div class="baniere">
        <h2><?= $nomgenre ?> </h2>
    </div>
    <div class="list_affiche">
    <?php foreach($films as $film) { ?>
        <div class="list_content">
            <div class="description">
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><img src="<?= $film["affiche_film"] ?>" alt=""></a>
                <p><?= $film['titre_film'] ?></p>
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