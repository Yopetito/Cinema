<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenue">
            <nav class="navbar">
                <img class ="logo" src="public/img/logo_cinelan.png" alt="">
                <div class="boutons">
                    <a href="index.php?action=accueil">Accueil</a>
                    <a href="index.php?action=listFilms">Films</a>
                    <a href="index.php?action=listActeurs">Acteurs</a>
                    <a href="index.php?action=listRealisateurs">Realisateurs</a>
                    <a href="index.php?action=listGenres">Genres</a>
                    <a href="index.php?action=listPersonnages">Personnages</a>
                </div>
            </nav>   
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>
</html>