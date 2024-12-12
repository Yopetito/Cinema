<?php 
ob_start(); 

if(!empty($films)) {

    foreach ($films as $film) { ?>
        <p> Date de sortie: <?= $film["dateSortie"]; ?></p>
        <p> Durée: <?= $film["duree"] ?></p>
        <p> Realisateur: <a href="index.php?action=detailRealisateur&id=<?= $film["id_realisateur"] ?>"><?= $film["realisateur"] ?></a></p>
    <?php } ?> 
    <p> Genre:</p>
    <?php
    foreach ($genres as $genre) { ?>
        <ul>
            <li><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></li>
        </ul>
    <?php } ?>

    <table  border = 1 class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Acteur</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($castings as $casting) { ?>
                <tr>
                    <td><a href="index.php?action=detailActeur&id=<?= $casting["id_acteur"] ?>"><?= $casting["nomprenom"] ?></a></td>
                    <td><a href="index.php?action=detailPersonnage&id=<?= $casting["id_personnage"] ?>"><?= $casting["nom_personnage"] ?></a></td>
                </tr>
            <?php } ?>       
        </tbody>
    </table>
    <?php
    $titre = $film['titre_film'];
} else {
    $titre = "Liste de films";
    ?> <h2>Pas de film trouvé</h2> <?php
}

$contenu = ob_get_clean();
require "template.php";
?>
