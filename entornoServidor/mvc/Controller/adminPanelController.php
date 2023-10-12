<?php

if(!empty($_GET['nPanel'])) {
    include("View/adminPanelView.phtml");
    die;
}

if(!empty($_GET['editPub'])){
    $pubs = PublicacionRepository::getPublicaciones();
    include("View/editPubView.phtml");    
    die;
}

if(!empty($_GET['editPub'])){
    $pubs = UserRepository::getUsers();
    include("View/editRolView.phtml");    
    die;
}

?>