<?php
require_once("Model/LineRepository.php");

if (!empty($_GET['add'])) {
    if (!empty($_GET['id'])) {
        $productId = $_GET['id'];
        $userId = $_SESSION['user']->getId(); // Obtener el ID del usuario desde la sesión

        // Obtener el orderId activo del usuario
        $orderId = UserRepository::getActiveOrderId($userId);

        //$orderId = $_SESSION['user']->getActiveOrderId(); // Suponiendo que tengas un método para obtener el ID del pedido activo

        // Definir la cantidad y el precio del producto
        $quantity = 1; // Podría ser cualquier cantidad que desees agregar
        $unitPrice = $producto->getPrice(); // El precio del producto (asegúrate de obtenerlo de donde corresponda)

        // Agregar el producto al carrito
        $message = LineRepository::addProductToCart($orderId, $productId, $quantity, $unitPrice);

        // Redirigir a la vista del catálogo o a la vista del carrito
        header("Location: index.php?c=mainView");
        exit();
    }
}
?>

