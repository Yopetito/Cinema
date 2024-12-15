<?php
ob_start();
?>

<form class="add_acteur" action="index.php?action=addActeur" method="POST">
    <p>
        <label for="nom">Nom:</label>
        <input type="text" id="nomActeur" name="nomActeur" placeholder = "Nom">
    </p>
    <p>
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenomActeur" name="prenomActeur" placeholder="Prenom">
    </p>
    <p>Sexe:</p>
        <div class="radio_section">
            <label for="sexe_h">Homme</label>
            <input type="radio" id="sexe_h" name="sexe" value="Homme">
            <label for="sexe_f">Femme</label>
            <input type="radio" id="sexe_f" name="sexe" value="Femme">

            <div class="checked-radio-bg"></div>
        </div>
    </p>
        <label for="dateNaissance">Date de naissance:</label>
        <input type="date" id="dateNaissance" name="dateNaissance">
    </p>
    <p>              
        <input class="input_ajouter" type="submit" name="submit" value="Ajouter l'acteur">
    </p>
</form>

<?php
$titre = "Ajoutez un acteur";
$contenu = ob_get_clean();
require "view/template.php"; 