<?php 
ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= count($acteurs) ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Acteur</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach($acteurs as $acteur) { ?>
            <tr>
                <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["nom_prenom"] ?></a></td>
            </tr>
            <?php } ?>
    </tbody>
</table>

<button onclick="window.location.href='index.php?action=addActeur';">Ajouter un acteur</button>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "template.php";
?>