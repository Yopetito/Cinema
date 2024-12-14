<?php 
ob_start();
?>

<form class="add_genre" action="index.php?action=addGenre" method="POST">
    <p>
        <label for="nomGenre">Nom Genre:</label>
            <input type="text" id="nomGenre" name="nomGenre">
            <input class="input_ajouter" type="submit" name="submit" value="Ajouter le genre">
    </p>
</form>


<?php
$titre = "Ajouter un genre";
$contenu = ob_get_clean();
require "view/template.php";