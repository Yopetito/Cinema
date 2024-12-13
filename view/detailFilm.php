<?php 
ob_start(); 

if(!empty($films)) { ?>

    <?php foreach ($films as $film) { ?>
        <div class="baniere">
            <h2> <?= $film['titre_film'] ?></h2>
        </div>
        <div class="afficheDetail">
            <img src="<?= $film['affiche_film'] ?>" alt="">
            <div class="renseignement">
                <p> Date de sortie: <?= $film["dateSortie"]; ?></p>
                <p> Durée: <?= $film["duree"] ?></p>
                <p> Genre:</p>
                <?php
                foreach ($genres as $genre) { ?>
                    <ul>
                        <li><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></li>
                    </ul>
                <?php } ?>
            </div>
        </div>
       
        <div class="synopsis_film">
                <h3>Synopsis:</h3>
                <p><?= $film['synopsis_film']?></p>
        </div>
        <div class="baniere">
            <h3>Realisateur:</h3> 
        </div>
        <div class="sectionaffiche">
            <div class="affiche_list">
                <p><a href="index.php?action=detailRealisateur&id=<?= $film["id_realisateur"] ?>"><?= $film["realisateur"] ?></a></p>
                <img src="<?= $film['affiche_personne'] ?>" alt="">
            </div>
        </div>
        
        <?php } ?> 

    <div class="baniere">
        <h3>Acteurs:</h3> 
    </div>
    <div class="sectionaffiche">
    <?php
        foreach($castings as $casting) { ?>
            <div class="affiche_list">
                <a href="index.php?action=detailActeur&id=<?= $casting["id_acteur"] ?>"><img src="<?=$casting['affiche_personnage'] ?>" alt=""></a>
                <div class="description">
                    <p><?= $casting["nomprenom"] ?> </p>
                    <p>As <?= $casting["nom_personnage"] ?></p>
                </div>
            </div>
    <?php } ?>
    </div>

    <?php
    $titre = $film['titre_film'];
} else {
    $titre = "Liste de films";
    ?> <h2>Pas de film trouvé</h2> <?php
}

$contenu = ob_get_clean();
require "template.php";
?>
