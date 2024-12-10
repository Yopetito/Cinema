<?php
ob_start();
foreach($acteurs as $acteur){ ?>
    <p> Sexe:  <?= $acteur["sexe"]; ?></p>
    <p> Date de naissance: <?= $acteur["dateNaissance"] ?></p>
    <?php } ?>

<table  border = 1 class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>FILM</th>
            <th>ROLE INTERPRETE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($castings as $casting) { ?>
            <tr>
                <td><?= $casting["titre_film"] ?></td>
                <td><?= $casting["nom_personnage"] ?></td>
            </tr>
        <?php } ?>       
    </tbody>
</table>
<?php
$titre = $acteur["nomprenom"];
$titre_secondaire = $acteur["nomprenom"];
$contenu = ob_get_clean();
require "template.php";
?>