<?php
ob_start();
?>
<form action="index.php?action=addFilm" method="POST">
    <p>
        <label for="titre">Nom du film:</label>
        <input type="text" id="titre" name="titre" placeholder = "Nom du film">
    </p>
    <p>
        <label for="dateDeSortie">Date de sortie:</label>
        <input type="date" name="dateDeSortie" id="dateDeSortie">
    </p>
    <p>
        <label for="duree">Duree:</label>
        <input type="number" id="duree" name="duree" placeholder="Duration en minutes">
    </p>
        <label for="synopsis">Synopsis:</label>
        <textarea id="synopsis" name="synopsis" placeholder="Texte ici"></textarea>
    </p>

    <label for="id_realisateur">Realisateur:</label>
    <select id="id_realisateur" name="id_realisateur">
        <?php foreach($realisateurs as $realisateur) { ?>
                <option value="<?= $realisateur['id_realisateur'] ?>"><?=$realisateur['nomprenom']?></option>
        <?php } ?>
    </select>

    <fieldset>
        <legend>Genres:</legend>
        <?php foreach($genres as $genre) { ?>
        <div>
        <input type="checkbox" name="id_genre[]" value="<?= $genre['id_genre'] ?>" id="<?= $genre['id_genre'] ?>">
        <label for="<?= $genre['id_genre'] ?>"><?= $genre['nom_genre'] ?></label>
        </div>
        <?php } ?>
    </fieldset>
    <p>              
        <input type="submit" name="submit" value="Ajouter le film">
    </p>
</form>
<?php
$titre = "Ajout d'un film";
$titre_secondaire = "Ajoutez un film";
$contenu = ob_get_clean();
require "view/template.php";