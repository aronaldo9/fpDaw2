<?php

if(!empty($_POST['changeRol'])){
    UserRepository::updateRolById($_POST['state'],$_POST['id_user']);
}

if(!empty($_GET['editPub'])){
    $pubs = PublicacionRepository::getPublicaciones();
    include("View/editPubView.phtml");    
    die;
}


if(!empty($_GET['editRol'])){
    $users = UserRepository::getUsers();
    $state[0]="Baneado";
    $state[1]="Registrado";
    $state[2]="Admin";
    include("View/editRolView.phtml");    
    die;
}

include("View/adminPanelView.phtml");
die;

?>