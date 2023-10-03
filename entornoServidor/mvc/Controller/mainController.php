<?php

// gestiona variables entrada

// aplica cambios a la BD

// carga la vista correcta


require_once('Model/Publicacion.php');
require_once('Model/User.php');
require_once('Model/PublicacionRepository.php');
require_once('Model/UserRepository.php');

session_start();

$pubs = PublicacionRepository::getPublicaciones();

if(!empty($_POST['login'])){
    // llamar a un método que valide
    $_SESSION['user'] = UserRepository::validar($_POST['username'],$_POST['password']);
}

// carga la vista 
include("View/mainView.phtml");



?>