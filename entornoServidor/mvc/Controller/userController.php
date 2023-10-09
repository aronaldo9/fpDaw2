<?php

if(!empty($_POST['login'])){
    // llamar a un método que valide
    $_SESSION['user'] = UserRepository::validar($_POST['username'],$_POST['password']);
}

?>