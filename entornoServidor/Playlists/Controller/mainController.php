<?php
// gestiona variables entrada

// aplica cambios a la BD

// carga la vista correcta



require_once('Model/User.php');
require_once('Model/UserRepository.php');
session_start();
var_dump($_SESSION ['user']);
if(!empty($_GET['c'])){
    if($_GET['c']=="user"){
        require_once("Controller/userController.php");
    }
    // if($_GET['c']=="pub"){
    //     require_once("Controller/pubController.php");
    // }
    // if($_GET['c']=="comment"){
    //     require_once("Controller/commentController.php");
    // }
    // if($_GET['c']=="adminPanel"){
    //     require_once("Controller/adminPanelController.php");
    // }

    }


//carga la vista correcta
include("View/mainView.phtml");
?>