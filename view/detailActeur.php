<?php
ob_start();

if(!empty($acteurs)) {
    foreach($acteurs as $acteur){ ?>
        <div class="baniere">
            <h2> <?= $acteur['nomprenom'] ?></h2>
        </div>
        <div class="afficheDetail">
            <img src="<?= $acteur['affiche_personne'] ?>" alt="">
            <div class="renseignement">
                <p> Sexe: <?= $acteur["sexe"]; ?></p>
                <p> Date de naissance: <?= $acteur["dateNaissance"] ?></p>
            </div>
        </div>
    <?php } ?>

    <div class="baniere">
            <p>Films dans lequel il/elle a joué:</p>
    </div>
    <div class="sectionaffiche">
    <?php
        foreach($castings as $casting) { ?>
            <div class="affiche_list">
                <p><a href="index.php?action=listFilms&id=<?= $casting["id_film"] ?>"><img src="<?= $casting['affiche_film'] ?>" alt=""></a></p>
                <div class="description">
                    <p>As <?= $casting["nom_personnage"] ?></p>
                    <p>Date de sortie: <?= $casting['dateSortie'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    <?php
    $titre = $acteur["nomprenom"];
} else {
    $titre = "Liste d'acteurs";
    ?> <h2>Pas d'acteur trouvé</h2> <?php
}

$contenu = ob_get_clean();
require "template.php";
?>