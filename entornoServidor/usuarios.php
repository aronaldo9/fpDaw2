<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usarios</title>
</head>
<body>
    <?php
    require_once("db.php");

    $bd = Conectar::conexion(); 

    $name=$_POST['name'];
    $password=$_POST['password'];
    
    $q="SELECT * FROM users";
    $result = $bd->query($q);
    while ($datos = $result->fetch_assoc()) {
        if($datos['name'] == $name && $datos['password'] == $password) {
            echo 'OK';
        }else{
            echo 'Error';
        }
    }

    echo '<form method="POST" action="">
        Nombre: <input type="text" name="name" placeholder="Nombre" required/><br>
        Contraseña: <input type="password" name="password" placeholder="Contraseña" required/><br>
        <input type="submit" name="login" value="Entrar" placeholder="Entrar">
    </form>';
    ?>
</body>
</html>