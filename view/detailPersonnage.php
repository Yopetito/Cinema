<?php
ob_start();


if(!empty($persoFilms)) {
?>
    <table  border = 1 class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>FILMS</th>
                <th>INTERPRETE PAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($persoFilms as $persoFilm) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?= $persoFilm["id_film"] ?>"><?= $persoFilm["titre_film"] ?></a></td>
                    <td><a href="index.php?action=detailActeur&id=<?= $persoFilm["id_acteur"] ?>"><?= $persoFilm["nomprenom"] ?></a></td>
                </tr>
            <?php } ?>       
        </tbody>
    </table>
    <?php
    $titre = $persoFilm["nom_personnage"];
    $titre_secondaire = $persoFilm["nom_personnage"];
} else {
    $titre = "Liste de personnages";
    $titre_secondaire = "Pas de personnage trouvé !";
}
$contenu = ob_get_clean();
require "template.php";
?>