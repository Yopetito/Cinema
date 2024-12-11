<?php
ob_start();
?>

<form action="index.php?action=addActeur" method="POST">
    <p>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" placeholder = "Nom">
    </p>
    <p>
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" placeholder="Prenom">
    </p>
    <p>
        <label for="nom">Sexe:</label>
        <input type="text" id="sexe" name="sexe" placeholder="Homme/Femme">
    </p>
        <label for="dateNaissance">Date de naissance:</label>
        <input type="text" id="dateNaissance" name="dateNaissance" placeholder="aaaa/jj/mm">
    </p>
    <p>              
        <input type="submit" name="submit" value="Ajouter l'acteur">
    </p>
</form>

<?
$contenu = ob_get_clean();
require "view/template.php";