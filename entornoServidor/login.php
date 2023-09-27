<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    session_start(); // recuperamos la info almacenada en la sesión para ese usuario

    require_once("db.php");

    $bd = Conectar::conexion(); 

    if(!empty($_GET['logout'])) {
        $_SESSION['loged']=false;
        header('location:pelis.php');
    }

    if(!empty($_POST['login'])) {
        $q = "SELECT * FROM users WHERE name='".$_POST['name']."'";
        $result=$bd->query($q);
        // forma1
        // if($result->num_rows)
        // forma2
        if($datos=$result->fetch_assoc()){
            if($datos['password'] == md5($_POST['password'])){  // md5 es la contraseña encriptada
                $info = "OK";
                $_SESSION['loged']=true; // creamos la sesión para indicar que está logueado
                $_SESSION['username']=$datos['name'];
                $_SESSION['rol']=$datos['rol'];
                header('location:pelis.php');
            } else {
                $info = "Contraseña inválida";
            }
        } else {
            $info = "Usuario no encontrado";
        }
    }

?>


    <form method="POST" action="">
            Nombre: <input type="text" name="name" placeholder="Nombre" required/><br>
            Contraseña: <input type="password" name="password" placeholder="Contraseña" required/><br>
            <input type="submit" name="login" value="Entrar" placeholder="Entrar">
    </form>

    <?php
        if(!empty($info)){
            echo "<script>alert('".$info."')</script>";
        }
    ?>

</body>
</html>