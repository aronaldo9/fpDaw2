<?php
class UserRepository{

    public static function checkLogin($u,$p){
        $bd=Conectar::conexion();
        $q="SELECT * FROM user WHERE username='".$u."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            if($datos['password']==md5($p))
                return new User($datos);
        }
        else return NULL;

    }

    public static function getUserById($id){
        $bd=Conectar::conexion();
        $q="SELECT * FROM user WHERE id='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new User($datos);
        }

    }

    public static function getUsers(){
        $bd=Conectar::conexion();
        $q="SELECT * FROM user";
        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $users[] = new User($datos);
        }
        return $users;

    }
 
    public static function updateRolById($id,$rol){
        $bd=Conectar::conexion();
        $q="UPDATE user SET rol = ".$rol." WHERE id=".$id;
        if ($result=$bd->query($q))return TRUE;
        else return FALSE;
    }

    public static function register($u,$p){
        $bd=Conectar::conexion();
        $q="INSERT INTO user VALUES ( NULL, '".$u."', MD5('".$p."'), 1)";
        $bd->query($q);
    }
}


?>