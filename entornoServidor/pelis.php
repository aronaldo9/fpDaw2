<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php

    session_start();

    require_once("db.php");

    $bd = Conectar::conexion(); // con :: llamamos a un método estático

    // var_dump($_POST);

    if (!empty($_GET['borrar'])) {
        // $q="DELETE from peliculas WHERE id=".$_GET['borrar'];
        $q = "UPDATE peliculas SET state=0 WHERE id=" . $_GET['borrar'];
        $bd->query($q);
        header("location:pelis.php");
    }

    if (!empty($_GET['like'])) {
        $q = "INSERT into pelisvotos VALUES (" . $_GET['like'] . "," . $_SESSION['id'] . ")";
        $bd->query($q);
        $q2 = "UPDATE peliculas SET likes=likes+1 WHERE id=" . $_GET['like'];
        $bd->query($q2);

        header("location:pelis.php");
    }

    if (!empty($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $año = $_POST['año'];
        $poster = $_POST['poster'];
        $likes = $_POST['likes'];

        // var_dump($_POST);

        $q = "INSERT into peliculas VALUES(NULL, '" . $titulo . "', " . $año . ", '" . $poster . "',1,0)";
        $result = $bd->query($q);
    }


    $q = "SELECT * FROM peliculas WHERE state = 1";
    $result = $bd->query($q); // Es un objeto que contiene entre muchas cosas un array con información



    if (!empty($_SESSION['loged'])) {
        echo "Hola " . $_SESSION['username'] . "<br>" . "<a href='login.php?logout=1'>Salir</a>" . "<br>";
        echo "Hola " . $_SESSION['username'] . "<br>" . "<a href='follow.php?logout=1'>Followers</a>" . "<br>";
    } else {
        echo '<a href="login.php">Iniciar Sesión</a>' . "<br>";
    }

    if ($_SESSION['rol'] == 2) {
        echo '<a href="admin_usuarios.php">Ver Usuarios</a>';
    }

    echo '<form method="POST" action="">
                Título: <input type="text" name="titulo" placeholder="titulo" required/><br>
                Año: <input type="number" name="año" placeholder="año" required/><br>
                Poster: <input type="text" name="poster" placeholder="url de la imagen" required/>
                <input type="submit" name="enviar" value="enviar" placeholder="Enviar">
            </form>';

    while ($datos = $result->fetch_assoc()) { // podríamos usar fetch_array para sacar la posición
        echo '<img src="' . "imagenes/" . $datos['poster'] . '" width="300px" />';
        echo "Título: " . $datos['titulo'] . "<br>";
        echo "Año: " . $datos['año'] . "<br>";
        echo "Likes: " . $datos['likes'] . "<br>";

        if (!empty($_SESSION['rol'] > 1)) {
            echo '<a href=pelis.php?borrar=' . $datos['id'] . '>Borrar</a>';
            echo '<br>';
        }
        if (!empty($_SESSION['rol'] > 0)) {
            echo '<form method="GET" action="">
                    <input type="hidden" name="like" value="' . $datos['id'] . '">
                    <input type="submit" name="like_btn" value="LIKE">
                    </form>';
        }
    }
    ?>

</body>

</html>