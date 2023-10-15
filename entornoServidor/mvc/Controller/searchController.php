<?php

if(!empty($_GET['search'])){
    include("View/searchView.phtml");
    die;
}


if (!empty($_POST['searchPub'])) {
    $pubs = PublicacionRepository::getPublicacionesBuscadas($_POST);
    // Carga la vista para mostrar los resultados de la búsqueda
    include("View/searchResultsView.phtml");
    // Importante: detén la ejecución después de cargar la vista
    die;
}


?>