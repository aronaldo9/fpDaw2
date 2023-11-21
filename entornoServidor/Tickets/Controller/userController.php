<?php

if(isset($_GET['register'])){
    include ("View/registerView.phtml");
    die;
}

if(isset($_GET['logout'])){
    session_destroy();
    header("location: index.php");
}

if(isset($_POST['register'])){
    if($_POST['password']==$_POST['password2']){
        UserRepository::register($_POST['username'], $_POST['password']);
        include ("View/mainView.phtml");
        die;
    }
    else {
        include ("View/registerView.phtml");
        die;
    }
}

if(isset($_POST['login'])){
    $_SESSION['user']=UserRepository::checkLogin($_POST['username'], $_POST['password']);
}

?>