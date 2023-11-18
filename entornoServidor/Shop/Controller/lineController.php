<?php
require_once("Model/LineRepository.php");
require_once("Model/ProductRepository.php");

if (!empty($_GET['add'])) {
    if (!empty($_GET['id'])) {
        $productId = $_GET['id'];

        // Obtener el producto desde la base de datos
        $producto = ProductRepository::obtenerProductoPorId($productId);

        if ($producto) {
            $userId = $_SESSION['user']->getId(); // Obtener el ID del usuario desde la sesión

            // Obtener el orderId activo del usuario
            $orderId = UserRepository::getActiveOrderId($userId);

            // Definir la cantidad y el precio del producto
            $quantity = 1; // Podría ser cualquier cantidad que desees agregar
            $unitPrice = $producto->getPrice(); // El precio del producto

            // Agregar el producto al carrito
            $message = LineRepository::addProductToCart($orderId, $productId, $quantity, $unitPrice);

            // Redirigir a la vista del catálogo o a la vista del carrito
            header("Location: index.php?c=mainView");
            exit();
        } else {
            // Manejar el caso en que el producto no se pueda obtener
            echo "Error: No se pudo obtener el producto.";
        }
    }
}

?>

