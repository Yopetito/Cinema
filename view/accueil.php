<?php
ob_start();
?>
<div class="slogan">
    <img src="public/img/Hollywood.jpg" alt="">
    <p>Toutes les informations <br> du cinéma en un click</p>
</div>
<div class="dernierfilms">
    <div class="banierefilms">
        <p>Derniers films ajoutés :</p>
    </div>
    <div class="affichefilms">
        <?php foreach($films as $film) { ?>
        <div class="films">
            <a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><img src="<?=$film['affiche_film']?>" alt=""></a>
            <p><?=$film['titre_film']?></p>
        </div>
        <?php } ?>
    </div>
</div>
<div class="topacteurs">
    <div class="baniereacteurs">
        <p>Acteurs avec le plus de films :</p>
    </div>
    <div class="afficheacteurs">
       <?php foreach($acteurs as $acteur) { ?>
        <div class="acteur">
            <img src="<?=$acteur['affiche_personne']?>" alt="">
            <p><?= $acteur['nomprenom']?></p>
        </div>
        <?php } ?>
    </div>
</div>
<?php
$titre = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";