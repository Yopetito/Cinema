<?php
ob_start();


use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
    }
}

    $titre = "Index";
    $titre_secondaire = "Index";
    $contenu = ob_get_clean();
    require_once "view/template.php";
?>