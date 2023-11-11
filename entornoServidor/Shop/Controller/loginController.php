<?php

if (!empty($_POST['login'])) {
    $_SESSION['user'] = UserRepository::login($_POST['name'], $_POST['password']);
}

if (!empty($_POST['login2'])) {
    UserRepository::registrarse($_POST['name'], $_POST['password'], $_POST['password2']);
}

if (!empty($_GET['logout'])) {
    session_destroy();
    session_start();
}
