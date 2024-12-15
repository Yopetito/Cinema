<?php
ob_start();
?>

<form class="add_casting" action="index.php?action=addCasting" method="POST">
     <label for="id_film">Nom du film</label>         
    <select id="id_film" name="id_film">
        <?php foreach($films as $film) { ?>
            <option value="<?= $film['id_film'] ?>"><?php echo $film['titre_film']; ?></option>
        <?php } ?>
    </select>           
    <label for="id_personnage">Quel rôle ?</label>
    <select id="id_personnage" name="id_personnage">
        <?php foreach($personnages as $personnage) { ?>
            <option value="<?= $personnage['id_personnage'] ?>"><?php echo $personnage['nom_personnage']; ?></option>
        <?php } ?>
    </select>
    <label for="id_acteur">Nom de l'acteur:</label>
    <select id="id_acteur" name="id_acteur">
        <?php foreach($acteurs as $acteur) { ?>
            <option value="<?= $acteur['id_acteur'] ?>"><?php echo $acteur['nomprenom']; ?></option>
        <?php } ?>
    </select> 
    <div class="submit-row">
        <input class="input_ajouter" type="submit" name="submit" value="Ajouter le Casting">
    </div>
</form>

<?php
$titre = "Ajoutez un casting";
$contenu = ob_get_clean();
require "view/template.php"; 