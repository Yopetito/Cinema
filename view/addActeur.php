<?php
ob_start();
?>

<form action="index.php?action=addActeur" method="POST">
    <p>
        <label for="nom">Nom:</label>
        <input type="text" id="nomActeur" name="nomActeur" placeholder = "Nom">
    </p>
    <p>
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenomActeur" name="prenomActeur" placeholder="Prenom">
    </p>
    <p>Sexe:</p>
        <p>
            <label for="sexe">Homme:</label>
            <input type="radio" id="sexe_h" name="sexe" value="Homme">
            <label for="sexe">Femme:</label>
            <input type="radio" id="sexe_f" name="sexe" value="Femme">
        </p>
    </p>
        <label for="dateNaissance">Date de naissance:</label>
        <input type="date" id="dateNaissance" name="dateNaissance" placeholder="aaaa/jj/mm">
    </p>
    <p>              
        <input type="submit" name="submit" value="Ajouter l'acteur">
    </p>
</form>

<?php
$titre = "Ajoutez un acteur";
$contenu = ob_get_clean();
require "view/template.php"; 