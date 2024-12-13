<?php
ob_start();
?>
<div class="slogan">
    <img src="public/img/Hollywood.jpg" alt="">
    <p>Toutes les informations <br> du cinéma en un click</p>
</div>

<!-- =========FILMS========= -->

<div class="sectionafficheaccueil">
    <div class="sectionbaniere">
        <p>Derniers films ajoutés :</p>
    </div>
    <div class="blockaffiche">
        <div class="block">
            <?php foreach($films as $film) { ?>
            <div class="affiche">
            <a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><img src="<?=$film['affiche_film']?>" alt=""></a>
            <p><?=$film['titre_film']?></p>
            </div>
        <?php } ?>
        </div>
    </div>
</div>


<!-- =========ACTEURS========= -->

<div class="sectionafficheaccueil">
    <div class="sectionbaniere">
        <p>Acteurs avec le plus de films :</p>
    </div>
    <div class="blockaffiche">
        <div class="block">
        <?php foreach($acteurs as $acteur) { ?>
            <div class="affiche">
            <a href="index.php?action=detailFilm&id=<?=$acteur["id_acteur"]?>"><img src="<?=$acteur['affiche_personne']?>" alt=""></a>
            <p><?= $acteur['nomprenom']?></p>
            </div>
        <?php } ?>
        </div>
    </div>
</div>



<?php
$titre = "Accueil";
$contenu = ob_get_clean();
require "view/template.php";