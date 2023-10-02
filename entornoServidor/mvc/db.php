<?php
class Conectar{
    public static function conexion() {
        $conexion=new mysqli("localhost", "root", "", "test3");
        $conexion->query("SET NAMES 'utf8'"); // la -> se usa para llamar a un método del objeto(es el . de java)
        return $conexion;
    }
}
?>