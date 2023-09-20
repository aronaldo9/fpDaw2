<?php

require_once("db.php");

$bd = Conectar::conexion(); // con :: llamamos a un método estático

$q = "SELECT * FROM peliculas";
$result=$bd->query($q); // Es un objeto que contiene entre muchas cosas un array con información
while($datos=$result->fetch_assoc()){ // podríamos usar fetch_array para sacar la posición
    echo $datos['titulo']."<br>";

}


?>