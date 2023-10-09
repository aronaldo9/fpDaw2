<?php

class CommentRepository {

    public static function getCommentsByPubId($id) {
        $bd=Conectar::conexion();
        $comments=[];
        $q="SELECT * FROM comments WHERE pub_id='".$id."'";
        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
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


    public static function newComment($datos) {
        $bd=Conectar::conexion();
        $q = "INSERT INTO comments VALUES (NULL, " .$_SESSION['user']->getId().", ".$datos['pub_id'].", '". $datos['comment']."', NOW())";
        $bd->query($q);

    }

}


?>