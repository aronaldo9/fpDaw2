<?php

class LineRepository {
    public static function addProductToCart($orderId, $productId, $quantity, $unitPrice) {
        // Aquí se inserta el nuevo detalle de la orden, representando el producto en el carrito.
        $bd = Conectar::conexion();
        $subtotal = $quantity * $unitPrice;

        $q = "INSERT INTO order_details (order_id, product_id, quantity, unit_price, subtotal) 
              VALUES ('$orderId', '$productId', '$quantity', '$unitPrice', '$subtotal')";

        $result = $bd->query($q);

        if ($result) {
            return "Producto agregado al carrito exitosamente.";
        } else {
            return "Error al añadir el producto al carrito: " . $bd->error;
        }
    }
}


?>