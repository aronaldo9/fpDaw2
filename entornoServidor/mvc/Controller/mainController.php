<?php

// gestiona variables entrada

// aplica cambios a la BD

// carga la vista correcta


require_once('Model/Publicacion.php');
require_once('Model/User.php');
require_once('Model/PublicacionRepository.php');
require_once('Model/UserRepository.php');
require_once('Model/Comment.php');
require_once('Model/CommentRepository.php');

session_start();

if(!empty($_GET['c'])){
    if($_GET['c']=="user"){
        require_once("Controller/userController.php");
    }
    if($_GET['c']=="pub"){
        require_once("Controller/pubController.php");
    }
    if($_GET['c']=="comment"){
        require_once("Controller/commentController.php");
    }
    if($_GET['c']=="adminPanel"){
        require_once("Controller/adminPanelController.php");
    }
    // if($_GET['c']=="search"){
    //     require_once("Controller/searchController.php");
    // }

}


$buscador = "";
$campo = "title";
$ord = "asc";

// Número de resultados por página
$publicacionesPorPagina = 2;

// Página actual
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el índice de inicio para la paginación
$indiceInicio = ($paginaActual - 1) * $publicacionesPorPagina;

if (!empty($_POST['buscar'])) {
    $buscador = $_POST['buscador'];
    $campo = $_POST['opcionesCampo'];
    $ord = $_POST['opcionesOrd'];
}
$pubs = PublicacionRepository::buscar($buscador, $campo, $ord, $indiceInicio, $publicacionesPorPagina);

// Obtener el número total de publicaciones
$totalPublicaciones = count(PublicacionRepository::getPublicaciones());

// Calcular el total de páginas
$totalPaginas = ceil($totalPublicaciones / $publicacionesPorPagina);


//carga la vista correcta
include("View/mainView.phtml");


?>