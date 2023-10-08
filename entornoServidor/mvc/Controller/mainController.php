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

if(!empty($_GET['newPub'])) {
    include("View/newPubView.phtml");
    die;
}

if (!empty($_POST['newPub'])) {
    PublicacionRepository::publicar($_POST,$_FILES);
}

$pubs = PublicacionRepository::getPublicaciones();

if(!empty($_POST['login'])){
    // llamar a un método que valide
    $_SESSION['user'] = UserRepository::validar($_POST['username'],$_POST['password']);
}


// carga la vista 
include("View/mainView.phtml");


?>