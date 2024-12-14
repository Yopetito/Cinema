<?php
ob_start();
?>
<h2>Acteurs trouvés :</h2>
<div class="list_affiche">
    <?php if (!empty($personnes)) { ?>
        <?php foreach($personnes as $personne) { ?>
            <div class="list_content">
                <a href="index.php?action=detailActeur&id=<?= $personne["id_acteur"] ?>">
                    <img src="<?= $personne["affiche_personne"] ?>" alt="">
                </a>
                <div class="description">
                    <p><?= $personne["prenom"] ?> <?= $personne["nom"] ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>Aucun acteur trouvé.</p>
    <?php } ?>
</div>

<h2>Films trouvés :</h2>
<div class="list_affiche">
    <?php if (!empty($films)) { ?>
        <?php foreach($films as $film) { ?>
            <div class="list_content">
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
                    <img src="<?= $film["affiche_film"] ?>" alt="">
                </a>
                <div class="description">
                    <p><?= $film["titre_film"] ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>Aucun film trouvé.</p>
    <?php } ?>
</div>

<?php
$titre = "Recherche";
$contenu = ob_get_clean();
require "template.php";
?>
