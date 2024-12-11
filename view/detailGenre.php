<?php
ob_start();

if(!empty($films)) {
    ?>
    <table border = 1 class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>FILMS DE CE GENRE</th>
                <th>ANNEE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($films as $film) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a></td>
                    <td><?= $film["dateSortie"] ?></td>
                </tr>
            <?php } ?>       
        </tbody>
    </table>
    <?php
    $titre = $film["nom_genre"];
    $titre_secondaire = $film["nom_genre"];
} else {
    $titre = "Liste de films";
    $titre_secondaire = "Pas de film trouvé dans cette catégorie";
}
$contenu = ob_get_clean();
require "template.php";
?>