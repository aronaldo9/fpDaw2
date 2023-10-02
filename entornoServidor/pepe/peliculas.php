<html>
    <body>
        <?php
        session_start();
        
        require_once("conBD.php");
        
        $bd = Conectar::conexion();
        
        if(!empty($_POST['boton'])){
            $q2= 'INSERT INTO peliculas(title,año,poster) VALUES("'.$_POST['titulo'].'",'.$_POST['año'].',"'.$_POST['poster'].'")';
            $result2 = $bd->query($q2);
        }

        if(!empty($_GET['idPel'])){
            $q3 = "UPDATE peliculas SET state=0 WHERE id_pelicula=".$_GET['idPel'];
            $result3 = $bd->query($q3);
            header("Location:peliculas.php");
        }

        if(!empty($_GET['like'])){
            $q5 = "INSERT INTO inter VALUES (".$_GET['like'].",".$_SESSION['idUser'].")";
            $bd -> query($q5);
            $q6 = "UPDATE peliculas SET likes = likes+1 WHERE id_pelicula=".$_GET['like'];
            $bd -> query($q6);
            header("Location:peliculas.php");
        }
        
        if(!empty($_GET['unlike'])){
            $q7 = "DELETE FROM inter WHERE id_pelicula=".$_GET['unlike']." AND id_usuario=".$_SESSION['idUser'];
            $bd -> query($q7);
            $q8 = "UPDATE peliculas SET likes = likes-1 WHERE id_pelicula=".$_GET['unlike'];
            $bd -> query($q8);
            header("Location:peliculas.php");
        }

        
        if(!empty($_SESSION['loged'])){
            echo "<h3><a href=login.php?logout=1>Cerrar sesion</a></h3>";
            if($_SESSION['rol'] == 2){
                echo "<h1>Hola, ".$_SESSION['name']."</h1>";
                echo '<form action="peliculas.php" method="POST">
                <h4>AÑADE UNA PELICULA</h3>
                Titulo: <input type="text" name="titulo"><br>
                Año: <input type="text" name="año"><br>
                Poster: <input type="text" name="poster"><br>
                <a href=peliculas.php><input type="submit" name="boton" value="Añadir"></a>
                </form>';                
            }
        }else{
            echo "<h1>Inicia sesion para poder ver el contenido de la pagina</h1>";
            echo "<h3><a href=login.php>Iniciar sesion</a></h3>";
        }

        $q = "SELECT * FROM peliculas";
        $result = $bd->query($q);
        
        if(!empty($_SESSION['rol'])){
            while($dato=$result->fetch_assoc()){

                $q4 = "SELECT * FROM inter WHERE id_usuario=".$_SESSION['idUser']." AND id_pelicula=".$dato['id_pelicula'];
                $result4= $bd -> query($q4);

                if($result4 -> num_rows == 0){
                    if($dato['state'] > 0){
                        if($_SESSION['rol'] == 2){
                            echo "<hr>";
                            echo "<img src=imagenes/".($dato['poster'])." width=200px height=200px><br>";
                            echo ($dato['title'])."<br>";
                            echo ($dato['año'])."<br>";
                            echo ($dato['likes'])."❤️<br>";
                            echo "<a href=peliculas.php?like=".$dato['id_pelicula'].">Like 👍</a><br>";
                            echo "<a href=peliculas.php?idPel=".$dato['id_pelicula'].">Borrar ❌</a>";
                        }elseif($_SESSION['rol'] == 1){
                            echo "<hr>";
                            echo "<img src=imagenes/".($dato['poster'])." width=200px height=200px><br>";
                            echo ($dato['title'])."<br>";
                            echo ($dato['año'])."<br>";
                            echo ($dato['likes'])."❤️<br>";
                            echo "<a href=peliculas.php?like=".$dato['id_pelicula'].">Like 👍</a><br>";
                        }
                    }
                }else{
                    if($dato['state'] > 0){
                        if($_SESSION['rol'] == 2){
                            echo "<hr>";
                            echo "<img src=imagenes/".($dato['poster'])." width=200px height=200px><br>";
                            echo ($dato['title'])."<br>";
                            echo ($dato['año'])."<br>";
                            echo ($dato['likes'])."❤️<br>";
                            echo "<a href=peliculas.php?unlike=".$dato['id_pelicula'].">DisLike 👎</a><br>";
                            echo "<a href=peliculas.php?idPel=".$dato['id_pelicula'].">Borrar ❌</a>";
                        }elseif($_SESSION['rol'] == 1){
                            echo "<hr>";
                            echo "<img src=imagenes/".($dato['poster'])." width=200px height=200px><br>";
                            echo ($dato['title'])."<br>";
                            echo ($dato['año'])."<br>";
                            echo ($dato['likes'])."❤️<br>";
                            echo "<a href=peliculas.php?unlike=".$dato['id_pelicula'].">DisLike 👎</a><br>";
                        }
                    }
                }
            }
        }
        ?> 
    </body>
</html>