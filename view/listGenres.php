<?php 
ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= count($genres) ?> Genres</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($genres as $genre) { ?>
            <tr>
                <td><?= $genre["nom_genre"] ?></td>
            </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres";
$contenu = ob_get_clean();
require "template.php";
?>