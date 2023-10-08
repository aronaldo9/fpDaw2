<?php

class CommentRepository {

    public static function getCommentsByPubId($id) {
        $bd=Conectar::conexion();
        $comments=[];
        $q="SELECT * FROM comments WHERE id_pub='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            $comments[] = new Comment($datos);
        }
        return $comments;
    }

    // public static function getComments() {
    //     $bd=Conectar::conexion();

    //     $q="SELECT * FROM comments";
    //     $result=$bd->query($q);
    //     while($datos=$result->fetch_assoc()){
    //         $comments[] = new Comment($datos);
    //     }

    //     return $comments;
    // }


    public static function addComments() {
        $bd=Conectar::conexion();

        $q = "INSERT INTO comments VALUES (" . $_SESSION['user']->getId() . ", " . $_POST['publicacion']->getId() . ", '" . $_POST['text'] . "', NOW())";
        $bd->query($q);

    }

}


?>