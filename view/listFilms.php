<?php 
ob_start(); 

?>

<p class="uk-label uk-label-warning">Il y a <?= count($films) ?> films</p>

<table border = 1 class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>DUREE</th>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($films as $film) { ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
                <td><?= $film["Date_de_sortie"] ?></td>
                <td><?= $film["Duration"] ?></td>
                <td><?= $film["Createur"] ?></td>
            </tr>
            <?php } ?>
    </tbody>
</table>

<button onclick="window.location.href='index.php?action=addFilm';">Ajouter un film</button>
<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "template.php";
?>