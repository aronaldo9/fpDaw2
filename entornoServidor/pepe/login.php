<html>
    <body>
        <?php
            session_start();

            require_once("conBD.php");

            $bd = Conectar::conexion();

            if(!empty($_GET['logout'])){
                session_destroy();
                // header("Location:peliculas.php");
            }
            
            if(!empty($_POST['usuario'])){
                $q = "SELECT * FROM users WHERE name='".$_POST['usuario']."';";
                $result = $bd -> query($q);
                
                if($dato = $result->fetch_assoc()){
                    if($dato['state'] > 0){
                        if($dato['password'] == md5($_POST['passwd'])){
                            $info = "Ok";
                            $_SESSION['loged'] = true;
                            $_SESSION['idUser'] = $dato['id_usuario'];
                            $_SESSION['name'] = $dato['name'];
                            $_SESSION['rol'] = $dato['rol'];
                            header("Location:peliculas.php");
                        }else $info = "Contraseña incorrecta";
                    }else header("Location:login.php?logout=1");
                }else $info = "Usuario no encontrado en el sistema";
            }
            ?>
        <form action="login.php" method="POST">
            User: <input type="text" name="usuario"><br>
            Password: <input type="text" name="passwd"><br>
            <input type="submit" value="Login">
        </form>
        
    </body>
</html>