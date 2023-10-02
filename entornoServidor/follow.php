<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="estilos.css">

</head>

<body>
    <h1>LISTA DE USUARIOS</h1>
    <br>
    <?php
    session_start();

    require_once("db.php");

    $bd = Conectar::conexion();

    if (empty($_SESSION['loged'])) {
        // Si no está logueado, redirigirlo a la página de inicio de sesión
        header('location: login.php');
        exit();
    }

    // Verificar si el usuario está baneado (deleted = 1)
    $user_id = $_SESSION['id'];
    $q = "SELECT deleted FROM users WHERE id = $user_id";
    $result = $bd->query($q);
    $row = $result->fetch_assoc();

    if ($row['deleted'] == 1) {
        header('location: login.php?logout=1');
        exit();
    }

    function isFollowing($id_user, $bd)
    {
        $q = "SELECT * FROM followers WHERE id_usuario=" . $_SESSION['id'] . " AND id_follower=" . $id_user . " AND state=1";
        $result = $bd->query($q);

        return $result->num_rows > 0;
    }

    if (!empty($_GET['follow'])) {
        $q = "DELETE FROM followers WHERE id_usuario=" . $_SESSION['id'] . " AND id_follower=" . $_GET['follow'];
        $q = "INSERT INTO followers VALUES(" . $_SESSION['id'] . ", " . $_GET['follow'] . ")";
        $bd->query($q);
    }

    if (!empty($_GET['unfollow'])) {
        $q = "UPDATE followers SET state=0 WHERE id_usuario=" . $_SESSION['id'] . " AND id_follower=" . $_GET['unfollow'];
        $bd->query($q);
    }


    $q = "SELECT * FROM users WHERE id <> " . $_SESSION['id'];
    $result = $bd->query($q);

    while ($datos = $result->fetch_assoc()) {
        $users[] = $datos;
    }
    ?>
    <?php
    foreach ($users as $user) {
        echo $user['name'];
        if (!isFollowing($user['id'], $bd)) {
            echo "<a href='follow.php?follow=" . $user['id'] . "'>Seguir</a><br>";
        } else {
            echo "<a href='follow.php?unfollow=" . $user['id'] . "'>Dejar de seguir</a><br>";
        }
        echo "<br>";

    }
    ?>
</body>

</html>