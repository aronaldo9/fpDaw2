<?php

class UserRepository{



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

    public static function registUsers($username, $hashedPassword) {
        $bd = Conectar::conexion();
    
        $q = "INSERT INTO users VALUES (NULL, '$username', '$hashedPassword', 1)";
        if ($bd->query($q) === TRUE) {
            // La inserción se realizó con éxito
            return true;
        } else {
            // Si ocurrió un error al insertar
            echo "Error al registrar el usuario: " . $bd->error;
            return false;
        }
    }


    // public static function getUsers() {
    //     // consultar a la BD
    //     $bd=Conectar::conexion();

    //     $q="SELECT * FROM users";

    //     $result=$bd->query($q);
    //     while($datos=$result->fetch_assoc()){
    //         $pubs[] = new User($datos);
    //     }
    //     // devolver el array
    //     return $pubs;
    // }
    


    // public static function getUserById($id) {
    //     $bd=Conectar::conexion();
    //     $q="SELECT * FROM users WHERE id_user='".$id."'";
    //     $result=$bd->query($q);
    //     if($datos=$result->fetch_assoc()){
    //         return new User($datos);
    //     }
    // }
}

?>