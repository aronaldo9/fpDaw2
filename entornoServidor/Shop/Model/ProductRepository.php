<?php

class ProductRepository {

    public static function addProduct($datos, $files)
{
    $bd = Conectar::conexion();
    if ($bd->connect_errno) {
        echo "Error en la conexión a la base de datos: " . $bd->connect_error;
        return;
    }

    move_uploaded_file($files['img']['tmp_name'], 'public/' . $files['img']['name']);
    
    $q = "INSERT INTO product VALUES (NULL,'" . $datos['description'] . "','" . $datos['name'] . "', '" . $datos['price'] . "', '" . $datos['stock'] . "', '" . $files['img']['name'] . "')";

    var_dump($q); // Verificar la consulta que se está ejecutando

    if ($bd->query($q) === TRUE) {
            echo "Nuevo registro insertado correctamente.";
        } else {
            echo "Error en la inserción: " . $bd->error;
        }

}

public static function deleteProduct($productId) {
    $bd = Conectar::conexion();

    $q = "DELETE FROM product WHERE id = $productId";
    var_dump($q);
    $result = $bd->query($q);

    if ($result) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $bd->error;
    }
}

    public static function obtenerProductoPorId($productId)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM product WHERE id = '$productId'";
        $result = $bd->query($q);

        if ($result->num_rows > 0) {
            $productoData = $result->fetch_assoc();
            print_r($productoData);
            return new Product($productoData);
        } else {
            return null;
        }
    }    


    public static function getProducts() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM product";

        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $products[] = new Product($datos);
        }
        return $products;
    }

}

?>