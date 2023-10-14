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

    public static function updatePubById($datos,$imagen)
    {
        if(!empty($imagen)){
            move_uploaded_file($imagen['tmp_name'], 'public/img/' . $imagen['img']);
            $datos['img'] = $imagen['img'];
            unlink("public/img/".$datos['img']);
            $datos['img']=$imagen['name'];
        }

        $bd = Conectar::conexion();
        $q = "UPDATE publicacion 
        SET title = '" . $datos['title'] . "', 
            text = '" . $datos['text'] . "',
            img = '" . $datos['img']."'
        WHERE id = " . $datos['id'];
        
        
        $bd->query($q);
        return $bd->insert_id;
    }
}

?>