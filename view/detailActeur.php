<?php
ob_start();

if(!empty($acteurs)) {
    foreach($acteurs as $acteur){ ?>
        <p> Sexe:  <?= $acteur["sexe"]; ?></p>
        <p> Date de naissance: <?= $acteur["dateNaissance"] ?></p>
        <?php } ?>

    <table  border = 1 class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>FILM</th>
                <th>ROLE INTERPRETE</th>
                <th>ANNEE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($castings as $casting) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?= $casting["id_film"] ?>"><?= $casting["titre_film"] ?></a></td>
                    <td><a href="index.php?action=detailPersonnage&id=<?= $casting["id_personnage"] ?>"><?= $casting["nom_personnage"] ?></a></td>
                    <td><?= $casting["dateSortie"] ?></td>
                </tr>
            <?php } ?>       
        </tbody>
    </table>
    <?php
    $titre = $acteur["nomprenom"];
} else {
    $titre = "Liste d'acteurs";
    ?> <h2>Pas d'acteur trouvé</h2> <?php
}

$contenu = ob_get_clean();
require "template.php";
?>