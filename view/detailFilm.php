<?php 
ob_start(); 

foreach ($films as $film) { ?>
    <p> Date de sortie: <?= $film["dateDeSortie_film"]; ?></p>
    <p> Durée: <?= $film["duree_film"] ?></p>
    <p> Realisateur: <?= $film["realisateur"] ?></p>
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
                <td><?= $casting["nom"] ?></td>
                <td><?= $casting["nom_personnage"] ?></td>
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
