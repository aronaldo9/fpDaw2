<?php
require_once("Model/User.php");

if(!empty($_POST['changeRol'])){
    UserRepository::updateRolById($_POST['state'],$_POST['id']);
}

if(!empty($_GET['editRol'])){
    $users = UserRepository::getUsers();
    $state[1]="Cliente";
    $state[2]="Trabajador";
    $state[3]="Admin";
    include("View/editRolView.phtml");    
    die;
}

include("View/adminView.phtml");
die;
?>