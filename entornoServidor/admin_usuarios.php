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

    if ($result->num_rows > 0) {
        echo "<ul>";

        while ($datos = $result->fetch_assoc()) {
            $users[] = $datos; // Guardar datos en el array users
        }

        // Iterar sobre el array de usuarios y mostrar la información
        foreach ($users as $user) {
            echo "<li>ID: " . $user['id'] . ", Nombre: " . $user['name'] . ", Rol: " . $user['rol'] . "</li>";
            echo '<img src="' ."imagenes/". $user['imagen'] . '" width="300px" />';
        }

        echo "</ul>";
    } else {
        echo "No se encontraron usuarios.";
    }
    // añadir botón de bannear

    // next: desbanear
    ?>
</body>
</html>