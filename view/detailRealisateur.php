<?php
ob_start();
foreach($realisateurs as $realisateur){ ?>
    <p> Sexe:  <?= $realisateur["sexe"]; ?></p>
    <p> Date de naissance: <?= $realisateur["dateNaissance"] ?></p>
    <?php } ?>

<table  border = 1 class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>FILMS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($films as $film) { ?>
            <tr>
                <td><?= $film["titre_film"] ?></td>
            </tr>
        <?php } ?>       
    </tbody>
</table>
<?php
$titre = $realisateur["nomprenom"];
$titre_secondaire = $realisateur["nomprenom"];
$contenu = ob_get_clean();
require "template.php";
?>