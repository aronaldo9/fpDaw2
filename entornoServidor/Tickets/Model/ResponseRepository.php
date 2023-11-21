<?php

class ResponseRepository{

    public static function getResponsesByTicketId($tid){
        $bd=Conectar::conexion();
        $q="SELECT * FROM response WHERE id_ticket=".$tid;
        $result=$bd->query($q);
        $r = [];
        while($datos=$result->fetch_assoc()){
            $r[] = new Response($datos);
        }
        return $r;
    }

    public static function newResponse($ticketId, $text){
        $bd=Conectar::conexion();
        $q="INSERT INTO response VALUES (NULL, '".$text."', ".$ticketId.", ".$_SESSION['user']->getId().")";
        $bd->query($q);
    }
}

?>