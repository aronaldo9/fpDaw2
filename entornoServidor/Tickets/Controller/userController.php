<?php

if (!empty($_POST['createTicket'])) {
    $userId = $_SESSION['user']->getId();
    $title = $_POST['title'];
    $text = $_POST['text'];

    // Validaciones adicionales si es necesario

    TicketRepository::createTicket($userId, $title, $text);
    // Puedes redirigir o mostrar un mensaje de éxito aquí
}

// Otras acciones del controlador para el cliente

?>
