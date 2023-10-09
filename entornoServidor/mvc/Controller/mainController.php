<?php

// gestiona variables entrada

// aplica cambios a la BD

// carga la vista correcta


require_once('Model/Publicacion.php');
require_once('Model/User.php');
require_once('Model/PublicacionRepository.php');
require_once('Model/UserRepository.php');
require_once('Model/Comment.php');
require_once('Model/CommentRepository.php');

session_start();

if(!empty($_GET['c'])){
    if($_GET['c']=="user"){
        require_once("Controller/userController.php");
    }
    if($_GET['c']=="pub"){
        require_once("Controller/pubController.php");
    }
    if($_GET['c']=="comment"){
        require_once("Controller/commentController.php");
    }
}









$pubs = PublicacionRepository::getPublicaciones();
// carga la vista 
include("View/mainView.phtml");


?>