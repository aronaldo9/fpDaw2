<?php

class UserRepository{


    public static function getUsers() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM user";

        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $pubs[] = new User($datos);
        }
        // construir el modelo con un array de publicaciones

        // devolver el array
        return $pubs;
    }


    public static function validar($u, $p) {
        $bd = Conectar::conexion();
    
        $q = "SELECT * FROM users WHERE username = '".$u."'";
        $result = $bd->query($q);
    
        if ($datos = $result->fetch_assoc()) {
            if ($datos['password'] == md5($p)) {
                return new User($datos); 
            } else {
                return NULL;
            }
        }
    }
}
    
?>