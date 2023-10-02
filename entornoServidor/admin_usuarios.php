<html>
    <body>
        <?php
            session_start();

            require_once("db.php");

            $bd = Conectar::conexion();

            $q = "SELECT * FROM users";
            $result = $bd->query($q);

            if(!empty($_GET['ban'])){
                $q2 = "UPDATE users SET deleted=1 WHERE id=".$_GET['ban'];
                $result2 = $bd->query($q2);
                header("Location:admin_usuarios.php");
            }

            if(!empty($_GET['unban'])){
                $q3 = "UPDATE users SET deleted=0 WHERE id=".$_GET['unban'];
                $result3 = $bd->query($q3);
                header("Location:admin_usuarios.php");
            }

            if(!empty($_SESSION['loged']) && $_SESSION['rol'] == 2){
                while($datos=$result->fetch_assoc()){
                    if($datos['deleted'] == 0){
                        echo "<b>id:</b><br>";
                        echo ($datos['id'])."<br>";
                        echo "<b>Nombre:</b><br>";
                        echo ($datos['name'])."<br>";
                        echo "<a href=admin_usuarios.php?ban=".$datos['id'].">Banear</a>";
                        echo "<br>";
                        echo "<br>";
                    }else{
                        echo "<b>idUsuario:</b><br>";
                        echo ($datos['id'])."<br>";
                        echo "<b>Nombre:</b><br>";
                        echo ($datos['name'])."<br>";
                        echo "<a href=admin_usuarios.php?unban=".$datos['id'].">Desbanear</a>";
                        echo "<br>";
                        echo "<br>";
                    }
                }
            }else{
                echo "<h1>Inicia sesion para poder ver el contenido de la pagina</h1>";
                echo "<h3><a href=login.php>Iniciar sesion</a></h3>";
            }
        ?>
    </body>
</html>