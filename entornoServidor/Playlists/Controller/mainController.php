<?php

require_once("Model/Cancion.php");
require_once("Model/CancionRepository.php");
require_once("Model/User.php");
require_once("Model/UserRepository.php");
require_once("Model/Lista.php");
require_once("Model/ListaRepository.php");


session_start();

if (!empty($_GET['c'])) {
    if ($_GET['c'] == "login") {
        require_once("Controller/loginController.php");
    }

    if ($_GET['c'] == "pl") {
        require_once("Controller/listaController.php");
    }

    if ($_GET['c'] == "cancion") {
        require_once("Controller/cancionController.php");
    }
}


if (isset($_SESSION['user'])) {
    $listas = ListaRepository::mostrarListasDeUsuario($_SESSION['user']->getId());
    include("View/mainView.phtml");
} else {
    include("View/loginView.phtml");
}






// datalist