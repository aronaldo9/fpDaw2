<?php
if (!empty($_POST['pl'])) {
    ListaRepository::crearLista($_SESSION['user']->getId(), $_POST['tituloPL']);
}

if (!empty($_POST['buscarBuscador'])) {
    $listasBuscador = ListaRepository::buscarPl($_POST['buscador']);
}

if (!empty($_GET['fav'])) {
    ListaRepository::listaFav($_SESSION['user']->getId(), $_GET['fav']);
}

if (!empty($_GET['editar'])) {
    $canciones = CancionRepository::getCanciones();
    $lista = ListaRepository::mostrarListaPorId($_GET['editar']);
    if (!empty($_GET['vuelta'])) {
        header("Location: index.php");
        exit;
    }
    include("View/editPLView.phtml");
    if (!empty($_POST['addCancion'])) {
        $cancion = ListaRepository::getCanByTitle($_POST['buscar']);
        ListaRepository::anadirCanPl($cancion->getId(), $_GET['editar'], $_GET['pl']);
        die;
    }
    if (!empty($_GET['del'])) {
        ListaRepository::eliminarCanPl($_GET['editar'], $_GET['del'], $_GET['pl']);
        die;
    }
    die;
}
