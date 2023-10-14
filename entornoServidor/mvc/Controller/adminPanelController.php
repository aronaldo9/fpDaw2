<?php

if(!empty($_POST['changeRol'])){
    UserRepository::updateRolById($_POST['state'],$_POST['id_user']);
}

if(!empty($_POST['editPub'])){
    PublicacionRepository::updatePubById($_POST,$_FILES);
}

if(!empty($_GET['editPub'])){
    $pubs = PublicacionRepository::getPublicaciones();
    include("View/editPubView.phtml");    
    die;
}

if(!empty($_POST['editPub'])){
    $editedData = [
        'id' => $_POST['pubId'],
        'title' => $_POST['editedTitle'],
        'text' => $_POST['editedText'],
        'img' => $_FILES,
    ];
    PublicacionRepository::updatePubById($editedData,$_FILES);
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