<?php

require_once("Model/User.php");
require_once("Model/UserRepository.php");
require_once("Model/Product.php");
require_once("Model/ProductRepository.php");
require_once("Model/Line.php");
require_once("Model/LineRepository.php");

session_start();

if (!empty($_GET['c'])) {
    if ($_GET['c'] == "login") {
        require_once("Controller/loginController.php");
    }

    if ($_GET['c'] == "pc") {
        require_once("Controller/productController.php");
    }

    if ($_GET['c'] == "lc") {
        require_once("Controller/lineController.php");
    }

    if ($_GET['c'] == "ac") {
        require_once("Controller/adminController.php");
    }

}


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user->getRol() == 2) {
        include("View/adminView.phtml");
    } else {
        $productos = ProductRepository::getProducts();
        include("View/mainView.phtml");
    }
} else {
    include("View/loginView.phtml");
}



?>