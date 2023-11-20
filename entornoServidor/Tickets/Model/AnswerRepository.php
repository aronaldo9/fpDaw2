<?php
class AnswerRepository {
    public static function getAnswersByTicketId($tid) {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM ticket WHERE ticketId=".$tid;
        $result=$bd->query($q);
        $r = null;
        while($datos=$result->fetch_assoc()){
            $r[] = new Answer($datos);
        }
        return $r;
    }

    public static function newAnswer($ticketId,$text) {
        $bd=Conectar::conexion();
        $q="INSERT INTO answer VALUES (null,'" . $ticketId . "','" . $text . "')";
    }

}
?>