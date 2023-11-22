<?php
if(isset($_GET['ticket'])) {
    $t=TicketRepository::getTicketById($_GET['ticket']);

header('Content-type: application/json');
//echo (UserRepository::json_encode_private($t));
echo json_encode($t->toJson());
die();
}

if(isset($_GET['alltickets'])) {
    $tickets=TicketRepository::getTickets();
    $a=[];
    foreach($tickets as $ticket) 
        $a=$ticket->toJson();
header("Content-type: application/json");
//echo (UserRepository::json_encode_private($t));
echo json_encode($a);
die();
}

?>