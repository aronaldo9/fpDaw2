<html>
    <body>
        <?php
            session_start();

            require_once("conBD.php");

            $bd = Conectar::conexion();

            $q = "SELECT * FROM users";
            $result = $bd->query($q);

            if(!empty($_GET['ban'])){
                $q2 = "UPDATE users SET state=0 WHERE id_usuario=".$_GET['ban'];
                $result2 = $bd->query($q2);
                header("Location:listadoUsers.php");
            }

            if(!empty($_GET['unban'])){
                $q3 = "UPDATE users SET state=1 WHERE id_usuario=".$_GET['unban'];
                $result3 = $bd->query($q3);
                header("Location:listadoUsers.php");
            }

            if(!empty($_SESSION['loged']) && $_SESSION['rol'] == 2){
                while($dato=$result->fetch_assoc()){
                    if($dato['state'] == 1){
                        echo "<b>idUsuario:</b><br>";
                        echo ($dato['id_usuario'])."<br>";
                        echo "<b>Nombre:</b><br>";
                        echo ($dato['name'])."<br>";
                        echo "<a href=listadoUsers.php?ban=".$dato['id_usuario'].">Banear</a>";
                        echo "<hr>";
                    }else{
                        echo "<b>idUsuario:</b><br>";
                        echo ($dato['id_usuario'])."<br>";
                        echo "<b>Nombre:</b><br>";
                        echo ($dato['name'])."<br>";
                        echo "<a href=listadoUsers.php?unban=".$dato['id_usuario'].">Desbanear</a>";
                        echo "<hr>";
                    }
                }
            }else{
                echo "<h1>Inicia sesion para poder ver el contenido de la pagina</h1>";
                echo "<h3><a href=login.php>Iniciar sesion</a></h3>";
            }
        ?>
    </body>
</html>