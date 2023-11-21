<?php

if(isset($_POST['newTicket'])){
    TicketRepository::newTicket($_POST['title'], $_POST['text']);
}

if(isset($_POST['assign'])){
    $ticket=TicketRepository::getTicketById($_GET['ticket']);
    $ticket->setWorker($_SESSION['user']->getId());
    $ticket->addResponse($_POST['response']);
}

if(isset($_POST['reply'])){
    $ticket=TicketRepository::getTicketById($_GET['ticket']);
    $ticket->addResponse($_POST['response']);
}

if(isset($_GET['close'])){
    $ticket=TicketRepository::getTicketById($_GET['close']);

    $ticket->close();
}

if(isset($_GET['valorar'])){
    $ticket=TicketRepository::getTicketById($_GET['ticket']);

    $ticket->setValoration($_GET['valorar']);
}
?>