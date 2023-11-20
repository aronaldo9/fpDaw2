<?php

if(isset($_GET['users'])){
    $users=UserRepository::getUsers();
    $state[0] = "baneado";
    $state[1] = "cliente";
    $state[2] = "trabajador";
    $state[3] = "admin";
    include("View/adminUsersView.phtml");
    die;
}

if(isset($_POST['changeRol'])){
    UserRepository::updateRolById($_POST['userid'], $_POST['state']);
    header('location:index.php?c=admin&users');
}
?>