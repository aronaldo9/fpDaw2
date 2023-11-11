<?php

class ProductRepository {

    public static function getProducts() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM product";

        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $products[] = new Product($datos);
        }
        // construir el modelo con un array de publicaciones

        // devolver el array
        return $products;
    }

    public static function addProduct($datos,$img)
    {
        $image=$img['img']['name'];
        move_uploaded_file($img['img']['tmp_name'],'public/img/'.$image);

        $bd = Conectar::conexion();
        $q = "INSERT INTO product VALUES (NULL,'" . $datos['description'] . "','" . $datos['name'] . "', '" . $datos['price'] . "', '" . $datos['stock'] . "', '".$image."')";
        
        
        $bd->query($q);
        return $bd->insert_id;
    }
}

?>