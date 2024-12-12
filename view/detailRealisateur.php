<?php
ob_start();

if(!empty($realisateurs)) {
    foreach($realisateurs as $realisateur){ ?>
        <p> Sexe:  <?= $realisateur["sexe"]; ?></p>
        <p> Date de naissance: <?= $realisateur["dateNaissance"] ?></p>
        <?php } ?>

    <table  border = 1 class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>FILMS</th>
                <th>ANNEE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($films as $film) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
                    <td><?= $film["dateSortie"] ?></td>
                </tr>
            <?php } ?>       
        </tbody>
    </table>
    <?php
    $titre = $realisateur["nomprenom"];
} else {
    $titre = "Liste des realisateurs";
    ?> <h2>Pas de réalisateur trouvé!</h2> <?php
}
$contenu = ob_get_clean();
require "template.php";
?>