<?php
require_once("Model/LineRepository.php");

if (!empty($_GET['action'])) {
    if ($_GET['action'] == 'add') {
        if (!empty($_GET['id'])) {
            $productId = $_GET['id'];
            $userId = $_SESSION['user']->getId(); // Obtener el ID del usuario desde la sesión

            // Agregar el producto al carrito
            LineRepository::addProductToCart($orderId, $productId, $quantity, $unitPrice);

            // Redirigir a la vista del catálogo o a la vista del carrito
            header("Location: index.php?c=mainView");
        }
    }
}
?>
