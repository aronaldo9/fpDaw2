<?php
if(!empty($_GET['newPub'])) {
    // Si se solicita agregar una nueva publicación, carga el formulario
    include("View/newPubView.phtml");
    die;  // Detén la ejecución para evitar que se cargue otra vista
}

if (!empty($_POST['newPub'])) {
    // Si se envió el formulario para agregar una nueva publicación
    PublicacionRepository::publicar($_POST,$_FILES);
    
    // Redirecciona a la página principal después de agregar la publicación
    header("Location: index.php");
    exit();  // Detén la ejecución para asegurar la redirección
}
?>
