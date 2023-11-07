<?php

class CancionRepository
{

    // static function duracion($cancion){

    // }

    static function addCancion($datos, $files)
    {
        move_uploaded_file($files['img']['tmp_name'], 'public/img/' . $files['img']['name']);
        move_uploaded_file($files['mp3']['tmp_name'], 'public/audio/' . $files['mp3']['name']);
        $bd = Conectar::conexion();
        $q = "INSERT INTO songs VALUES (null,'" . $datos['titulo'] . "','" . $datos['autor'] . "'," . $datos['duracion'] . ",'" . $files['img']['name'] . "','" . $files['mp3']['name'] . "','" . $_SESSION['user']->getId() . "')";
        var_dump($q);
        $result = $bd->query($q);
    }

    static function getCanciones()
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM songs");

        $canciones = [];
        while ($datos = $result->fetch_assoc()) {
            $canciones[] = new Cancion($datos);
        }
        return $canciones;
    }
}
