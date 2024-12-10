<?php 
ob_start(); 

foreach ($films as $film) { ?>
    <p> Date de sortie: <?= $film["dateDeSortie_film"]; ?></p>
    <p> Durée: <?= $film["duree_film"] ?></p>
    <p> Realisateur: <?= $film["realisateur"] ?></p>
    <p> Genre: <a href="index.php?action=detailGenre&id=<?= $film["id_genre"] ?>"><?= $film["nom_genre"] ?></a></p>
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
$titre_secondaire = $film['titre_film'];
$contenu = ob_get_clean();
require "template.php";
?>
