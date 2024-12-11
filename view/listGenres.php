<?php 
ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= count($genres) ?> Genres</p>

<table border = 1 class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($genres as $genre) { ?>
            <tr>
                <td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></td>
            </tr>
            <?php } ?>
    </tbody>
</table>

<button onclick="window.location.href='index.php?action=addGenre';">Ajouter un genre</button>
<?php

$titre = "Liste des Genres";
$titre_secondaire = "Liste des Genres";
$contenu = ob_get_clean();
require "template.php";
?>