<?php
ob_start();


if(!empty($persoFilms)) {
    $nompersonnage = $persoFilms[0]['nom_personnage'] ?>
    <div class="baniere">
        <h2><?= $nompersonnage ?></h2>
    </div>
<div class="personnages-container">
    <?php foreach($persoFilms as $persoFilm) { ?>
        <div class="personnage-item">
            <div class="personne">
                <a href="index.php?action=detailActeur&id=<?= $persoFilm["id_acteur"] ?>">
                    <img src="<?= $persoFilm['affiche_personne'] ?>" alt="">
                </a>
                <p class="nom-prenom">
                    <a href="index.php?action=detailActeur&id=<?= $persoFilm["id_acteur"] ?>">
                        <?= $persoFilm["nomprenom"] ?>
                    </a>
                </p>
            </div>
            <div class="film">
                <a href="index.php?action=detailFilm&id=<?= $persoFilm["id_film"] ?>">
                    <img src="<?= $persoFilm['affiche_film'] ?>" alt="">
                </a>
                <p class="titre-film">
                    <a href="index.php?action=detailFilm&id=<?= $persoFilm["id_film"] ?>">
                        <?= $persoFilm["titre_film"] ?>
                    </a>
                </p>
            </div>
        </div>
    <?php } ?>
</div>
<?php
$titre = $persoFilm["nom_personnage"];
} else {
    $titre = "Liste de personnages";
    ?> <h2>Pas de personnage trouvé !</h2> <?php
}
$contenu = ob_get_clean();
require "template.php";
?>