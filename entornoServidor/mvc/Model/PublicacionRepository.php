<?php

class PublicacionRepository{


    public static function getPublicaciones() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM publicacion";

        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $pubs[] = new Publicacion($datos);
        }
        // cosntruir el modelo con un array de publicaciones

        // devolver el array
        return $pubs;
    }
}

?>