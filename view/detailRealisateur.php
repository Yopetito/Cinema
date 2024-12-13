<?php
ob_start();
if(!empty($realisateurs)) {
    foreach($realisateurs as $realisateur){ ?>
        <div class="baniere">
            <h2> <?= $realisateur['nomprenom'] ?></h2>
        </div>
        <div class="afficheDetail">
            <img src="<?= $realisateur['affiche_personne'] ?>" alt="">
            <div class="renseignement">
                <p> Sexe: <?= $realisateur["sexe"]; ?></p>
                <p> Date de naissance: <?= $realisateur["dateNaissance"] ?></p>
            </div>
        </div>
    <?php } ?>

    <div class="baniere">
            <p>Films realisés:</p>
    </div>
    <div class="sectionaffiche">
    <?php
        foreach($films as $film) { ?>
            <div class="affiche_list">
                <p><a href="index.php?action=listFilms&id=<?= $film["id_film"] ?>"><img src="<?= $film['affiche_film'] ?>" alt=""></a></p>
                <div class="description">
                    <p>Date de sortie: <?= $film['dateSortie'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
    $titre = $realisateur["nomprenom"];
} else {
    $titre = "Liste d'acteurs";
    ?> <h2>Pas d'acteur trouvé</h2> <?php
}
$contenu = ob_get_clean();
require "template.php";
?>