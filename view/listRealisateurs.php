<?php 
ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= count($realisateurs) ?> realisateurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($realisateurs as $realisateur) { ?>
            <tr>
                <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["nomprenom"] ?></td>
            </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des realisateurs";
$contenu = ob_get_clean();
require "template.php";
?>