<?php

//gestiona variables entrada
require_once('Model/Ticket.php');
require_once("Model/TicketRepository.php");
require_once("Model/User.php");
require_once("Model/UserRepository.php");
require_once("Model/Response.php");
require_once("Model/ResponseRepository.php");
session_start();

if(!empty($_GET['c'])){
        require_once("Controller/".$_GET['c']."Controller.php");
}

if(isset($_SESSION['user']) && $_SESSION['user']->getRol()==3){
    $tickets=TicketRepository::getTickets();
    include("View/adminView.phtml");
    die;
}

if(isset($_SESSION['user']) && $_SESSION['user']->getRol()==2){
    $tickets=TicketRepository::getTicketsUnassigned();
}

//usa el modelo y aplica cambios a BD

//carga la vista correcta
include("View/mainView.phtml");
?>