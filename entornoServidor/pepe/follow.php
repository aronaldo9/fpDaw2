<html>
    <body>
        <?php
            session_start();

            require_once("conBD.php");

            $bd = Conectar::conexion();
            
            if(!empty($_GET['idus'])){
                $q2 = "INSERT INTO follow(id_usuario,id_seguido) VALUES (".$_SESSION['idUser'].",".$_GET['idus'].")";
                $bd -> query($q2);
                $q3 = "UPDATE users SET follows = follows +1 WHERE id_usuario=".$_GET['idus'];
                $bd -> query($q3);
                header("Location:follow.php");
            }
            
            if(!empty($_GET['idun'])){
                $q5 = "DELETE FROM follow WHERE id_usuario=".$_SESSION['idUser']." AND id_seguido=".$_GET['idun']."";
                $bd -> query($q5);
                $q6 = "UPDATE users SET follows = follows -1 WHERE id_usuario=".$_GET['idun'];
                $bd -> query($q6);
                header("Location:follow.php");
            }

            $q = "SELECT * FROM users WHERE id_usuario NOT IN (".$_SESSION['idUser'].")";
            $result = $bd -> query($q);

            while($dato=$result->fetch_assoc()){
                $q7 = "SELECT * FROM follow WHERE id_usuario=".$_SESSION['idUser']." AND id_seguido=".$dato['id_usuario'];
                $result7 = $bd -> query($q7);
                
                if($result7 -> num_rows == 0){
                    echo "<hr>";
                    echo "<b>User:</b> <br>";
                    echo $dato['name']."<br>";
                    echo "<b>Followers:</b>".$dato['follows']." <br>";
                    echo "<a href=follow.php?idus=".$dato['id_usuario'].">Follow</a>";
                }else{
                    echo "<hr>";
                    echo "<b>User:</b> <br>";
                    echo $dato['name']."<br>";
                    echo "<b>Followers:</b>".$dato['follows']." <br>";
                    echo "<a href=follow.php?idun=".$dato['id_usuario'].">UnFollow</a>";
                }
            }
        ?>
    </body>
</html>