<?php

class LineRepository {
    public static function addProductToCart($productId, $orderId, $quantity, $unitPrice) {
        // Aquí se inserta el nuevo detalle de la orden, representando el producto en el carrito.
        $bd = Conectar::conexion();
        $subtotal = $quantity * $unitPrice;

        $q = "INSERT INTO line VALUES (NULL, '$productId', '$orderId', '$quantity', '$unitPrice')";

        // Muestra el query para asegurarte de que es válido
        var_dump($q);

        $result = $bd->query($q);

        if ($result) {
            return "Producto agregado al carrito exitosamente.";
        } else {
            // Muestra los errores si ocurren
            echo "Error al añadir el producto al carrito: " . $bd->error;
        }
    }
}



?>