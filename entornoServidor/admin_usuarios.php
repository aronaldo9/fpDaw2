<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <?php
    session_start();
    require_once("db.php");

    // validar que el usuario es admin
    if($_SESSION['rol']<2){
        header('location:pelis.php');
    }
    
    // mostrar lista usuarios
    $bd = Conectar::conexion();
    $q = "SELECT * from users";
    $result=$bd->query($q);
    while($datos=$result->fetch_assoc()){
        $users[]=$datos;
    }
    // añadir botón de bannear

    // next: desbanear
    ?>
</body>
</html>