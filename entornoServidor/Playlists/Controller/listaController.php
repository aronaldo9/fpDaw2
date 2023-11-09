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

// Agrega la condición para abrir la lista
if (!empty($_GET['abrir'])) {
    // Lógica para abrir la lista (puedes redirigir o cargar la vista correspondiente)
    // Puedes acceder al ID de la lista mediante $_GET['abrir']
    $listaAbierta = ListaRepository::mostrarListaPorId($_GET['abrir']);

    // Verifica si la lista existe antes de continuar
    if ($listaAbierta) {        
        // Ahora, carga la vista para mostrar la lista abierta
        include("View/openPLFavView.phtml");
        exit;
    } else {
        // Si la lista no existe, puedes manejar el caso de error
        echo "La lista no existe o no tienes permisos para acceder.";
        exit;
    }
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
