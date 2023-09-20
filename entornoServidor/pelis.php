<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>

    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="titulo">
        <?php

            require_once("db.php");

            $bd = Conectar::conexion(); // con :: llamamos a un método estático

            // var_dump($_POST);

            if(!empty($_POST['titulo'])){
                $titulo=$_POST['titulo'];
                $año=$_POST['año'];
                $poster=$_POST['poster'];

                $q="INSERT into peliculas VALUES(NULL, '".$titulo."', ".$año.", '".$poster."')";
                $result = $bd->query($q);

            }
            

            $q = "SELECT * FROM peliculas";
            $result = $bd->query($q); // Es un objeto que contiene entre muchas cosas un array con información
            while ($datos = $result->fetch_assoc()) { // podríamos usar fetch_array para sacar la posición
                echo '<img src="' ."imagenes/". $datos['poster'] . '" width="300px" />';
                echo "Título: ".$datos['titulo'] . "<br>";
                echo "Año: ".$datos['año']."<br>";
                
            }
        ?>
    </div>

        <form method="POST" action="">
        Título: <input type="text" name="titulo" placeholder="titulo" required/><br>
        Año: <input type="number" name="año" placeholder="año" required/><br>
        Poster: <input type="text" name="poster" placeholder="url de la imagen" required/>
        <input type="submit" name="enviar" value="enviar" placeholder="Enviar">
        </form>

    

</body>

</html>