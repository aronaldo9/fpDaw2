<?php
require_once("Model/TicketRepository.php");
require_once("Model/User.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

// Incluir modelos y controladores necesarios

require_once("Model/UserRepository.php");
require_once("Model/Ticket.php");
require_once("Model/Answer.php");
require_once("Model/AnswerRepository.php");

if (!empty($_GET['c'])) {
    if($_GET['c'] == 'login') {
        require_once("Controller/loginController.php");
    }

    if ($_GET['c'] == "user") {
        // Controlador para acciones de usuario (cliente)
        require_once("Controller/userController.php");
    }

    if ($_GET['c'] == "worker") {
        // Controlador para acciones de trabajador
        require_once("Controller/workerController.php");
    }

    if ($_GET['c'] == "admin") {
        // Controlador para acciones de administrador
        require_once("Controller/adminController.php");
    }
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    if ($user->getRol() == 2) {
        // Si el usuario es un trabajador, mostrar sus tickets
        $tickets = TicketRepository::getWorkerTickets($user->getId());
        include("View/workerView.phtml");
    } elseif ($user->getRol() == 3) {
        // Si el usuario es un administrador, mostrar todos los tickets
        $tickets = TicketRepository::getAllTickets();
        include("View/adminView.phtml");
    } else {
        // Si el usuario es un cliente, mostrar sus tickets
        $tickets = TicketRepository::getClientTickets($user->getId());
        include("View/userView.phtml");
    }
} else {
    // Si no hay usuario registrado, mostrar la vista de inicio de sesión
    include("View/LoginView.phtml");
}

?>
