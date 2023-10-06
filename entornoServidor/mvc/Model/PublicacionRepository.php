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
        // construir el modelo con un array de publicaciones

        // devolver el array
        return $pubs;
    }

    public static function publicar($datos,$img)
    {
        $image=$img['img']['name'];
        move_uploaded_file($img['img']['tmp_name'],'public/img/'.$image);

        $bd = Conectar::conexion();
        $q = "INSERT INTO publicacion VALUES (NULL,'" . $datos['title'] . "','" . $datos['text'] . "',NOW(), '".$image."')";
        
        
        $bd->query($q);
        return $bd->insert_id;
    }
}

?>