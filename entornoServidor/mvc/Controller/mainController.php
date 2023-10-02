<?php

// gestiona variables entrada

// aplica cambios a la BD

// carga la vista correcta


require_once('Model/Publicacion.php');
require_once('Model/PublicacionRepository.php');

$pubs = PublicacionRepository::getPublicaciones();

// carga la vista 
include("View/mainView.phtml");



?>