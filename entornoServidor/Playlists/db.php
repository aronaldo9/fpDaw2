<?php
class Conectar
{
    public static function conexion()
    {
        $conexion = new mysqli("localhost", "root", "", "musica");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
