<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/style_responsive.css">
    <title><?= $titre ?></title>
</head>
<body>
<div class="burger-menu" id="burger_menu" onclick="showResponsiveMenu()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenue">

            <nav class="navbar" id="nav_menu">
                <img class ="logo" src="public/img/logo_cinelan.png" alt="">
                <div class="search-bar-container">
                    <form id="search-form" action="index.php?action=recherche" method="POST">
                        <input type="text" name="search" id="search-input" placeholder="Rechercher...">
                        <button type="submit" id="search-button">🔍</button>
                    </form>
                </div>
                <div class="boutons">
                    <a href="index.php?action=accueil">Accueil</a>
                    <a href="index.php?action=listFilms">Films</a>
                    <a href="index.php?action=listActeurs">Acteurs</a>
                    <a href="index.php?action=listRealisateurs">Realisateurs</a>
                    <a href="index.php?action=listGenres">Genres</a>
                    <a href="index.php?action=listPersonnages">Personnages</a>
                </div>
            </nav>   
            <!-- RESPONSIVE MENU -->
            <nav class="navigation" id="nav_responsive_menu">
            <ul class="list">
                <div class="search-bar-container">
                    <form id="search-form" action="index.php?action=recherche" method="POST">
                        <input type="text" name="search" id="search-input" placeholder="Rechercher...">
                        <button type="submit" id="search-button">🔍</button>
                    </form>
                </div>
                <li><a href="index.php?action=accueil">Accueil</a></li>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listActeurs">Acteurs</a></li>
                <li><a href="index.php?action=listRealisateurs">Realisateurs</a></li>
                <li><a href="index.php?action=listGenres">Genres</a></li>
                <li><a href="index.php?action=listPersonnages">Personnages</a></li>

            </ul>
        </nav>
        <?= $contenu ?>
            </div>
        </main>
    </div>

    <script src="public/js/main.js"></script>
</body>
</html>