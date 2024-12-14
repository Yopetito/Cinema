<?php
ob_start();
?>
<form class="add_film" action="index.php?action=addFilm" method="POST">
    <div class="colonne_gauche">
        <p>
            <label for="titre">Nom du film:</label>
            <input type="text" id="titre" name="titre" placeholder="Nom du film">
        </p>
        <p>
            <label for="dateDeSortie">Date de sortie:</label>
            <input type="date" name="dateDeSortie" id="dateDeSortie">
        </p>
        <p>
            <label for="id_realisateur">Réalisateur:</label>
            <select id="id_realisateur" name="id_realisateur">
                <?php foreach($realisateurs as $realisateur) { ?>
                    <option value="<?= $realisateur['id_realisateur'] ?>"><?php echo $realisateur['nomprenom']; ?></option>
                <?php } ?>
            </select>
        </p>
        <fieldset>
            <legend>Genres:</legend>
            <?php foreach($genres as $genre) { ?>
            <div>
                <label for="<?= $genre['id_genre'] ?>"><?php echo $genre['nom_genre']; ?></label>
                <input type="checkbox" name="id_genre[]" value="<?= $genre['id_genre'] ?>" id="<?= $genre['id_genre'] ?>">
            </div>
            <?php } ?>
        </fieldset>
    </div>

    <div class="colonne_droite">
        <p>
            <label for="duree">Durée:</label>
            <input type="number" id="duree" name="duree" placeholder="Durée en minutes">
        </p>
        <p>
            <label for="synopsis">Synopsis:</label>
            <textarea id="synopsis" name="synopsis" placeholder="Texte ici"></textarea>
        </p>
        <p>
            <label for="affiche_film">URL de l'image:</label>
            <input type="text" id="affiche_film" name="affiche_film" placeholder="URL de l'image">
        </p>
    </div>

    <div class="submit-row">
        <input class="input_ajouter" type="submit" name="submit" value="Ajouter le film">
    </div>
</form>
<?php
$titre = "Ajout d'un film";
$contenu = ob_get_clean();
require "view/template.php";