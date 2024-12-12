<?php 
ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= count($personnages) ?> personnages</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM DU PERSONNAGE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($personnages as $personnage) { ?>
            <tr>
                <td><a href="index.php?action=detailPersonnage&id=<?= $personnage["id_personnage"] ?>"><?= $personnage["nom_personnage"] ?></a></td>
            </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Personnages";
$contenu = ob_get_clean();
require "template.php";
?>