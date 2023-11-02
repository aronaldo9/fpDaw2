<?php

if(!empty($_POST['login'])){
    // llamar a un método que valide
    $_SESSION['user'] = UserRepository::validar($_POST['username'],$_POST['password']);
}

if(!empty($_GET['logout'])){
    session_destroy();
    session_start();
}

?>