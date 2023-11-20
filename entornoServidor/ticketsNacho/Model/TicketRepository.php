<?php

class TicketRepository{

    public static function getTicketById($id){
        $bd=Conectar::conexion();
        $q="SELECT * FROM ticket WHERE id='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new Ticket($datos);
        }
    }

    public static function getTickets(){
        $bd=Conectar::conexion();
        $q="SELECT * FROM ticket";
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }

    public static function getTicketsByUserId($uid){
        $bd=Conectar::conexion();
        $q="SELECT * FROM ticket WHERE id_user=".$uid;
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }
    public static function getTicketsByWorkerId($uid){
        $bd=Conectar::conexion();
        $q="SELECT * FROM ticket WHERE state=0 and id_worker=".$uid;
        $result=$bd->query($q);
        $r = [];
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }

    
    public static function getTicketsUnassigned(){
        $bd=Conectar::conexion();
        $q="SELECT * FROM ticket WHERE id_worker=0";
        $result=$bd->query($q);
        $r = [];
        while($datos=$result->fetch_assoc()){
            $r[] = new Ticket($datos);
        }
        return $r;
    }

    public static function newTicket($ti,$te){
        $bd=Conectar::conexion();
        $q="INSERT INTO ticket VALUES (NULL, '".$ti."', '".$te."', 0, ".$_SESSION['user']->getId().",0,0)";
        echo $q;
        $bd->query($q);
        return $bd->insert_id;
    }

    public static function assignWorker($id, $idW){
        $bd=Conectar::conexion();
        $q="UPDATE ticket SET id_worker = ".$idW." WHERE id = ".$id;
        $bd->query($q);
    }

    
    public static function close($id){
        $bd=Conectar::conexion();
        $q="UPDATE ticket SET state = 1 WHERE id = ".$id;
        $bd->query($q);
    }
    
    public static function setVal($id, $val){
        $bd=Conectar::conexion();
        $q="UPDATE ticket SET valoration = ".$val." WHERE id = ".$id;
        $bd->query($q);
    }
}

?>