<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        require_once("db.php");

        $bd = Conectar::conexion();

        if($_SESSION['rol']>0) {
            $q="SELECT * from users WHERE rol=1";
            $result = $bd->query($q);

            if ($result->num_rows > 0) {
                echo "<ul>";
        
                while ($datos = $result->fetch_assoc()) {
                    $users[] = $datos; // Guardar datos en el array users
                }
        
                // Iterar sobre el array de usuarios y mostrar la información
                foreach ($users as $user) {
                    echo "<li>Nombre: " . $user['name'] . ", Rol: " . $user['rol'] . "</li>";
                    echo '<form method="GET" action="">
                <input type="hidden" name="like" value="'.$user['id'].'">
                <input type="submit" name="like_btn" value="FOLLOW">
                </form>';
                }
        
                echo "</ul>";
            } else {
                echo "No se encontraron usuarios.";
            }

        }

    ?>
</body>
</html>