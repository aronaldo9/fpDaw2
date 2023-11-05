<?php

if (!empty($_POST['login'])) {
    $_SESSION['user'] = UserRepository::validar($_POST['username'], $_POST['password']);
    
}

if (!empty($_POST['login2'])) {
    UserRepository::registUsers($_POST['username'], $_POST['password'], $_POST['password2']);
}


if(!empty($_GET['logout'])){
    session_destroy();
    session_start();
}


?>