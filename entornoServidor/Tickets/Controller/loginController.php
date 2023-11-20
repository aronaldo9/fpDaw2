<?php
require_once("Model/User.php");


if (!empty($_POST['login'])) {
    $user = UserRepository::login($_POST['username'], $_POST['password']);
    if ($user) {
        $_SESSION['user'] = $user;
        var_dump($_SESSION['user']);
        $redirectUrl = determineRedirectUrl($user->getRol());
        header("Location: " . $redirectUrl);
        exit();
    }
}

if (!empty($_POST['login2'])) {
    // Proporciona el rol deseado al registrarse
    UserRepository::registrarse($_POST['username'], $_POST['password'], $_POST['password2'], $_POST['rol']);
}


if (!empty($_GET['logout'])) {
    session_destroy();
    session_start();
}

// Función para determinar la URL de redirección según el rol del usuario
function determineRedirectUrl($rol) {
    switch ($rol) {
        case 1: // user
            return 'index.php?c=user';
        case 2: // worker
            return 'index.php?c=worker';
        case 3: // admin
            return 'index.php?c=admin';
        default:
            return 'index.php';
    }
}

