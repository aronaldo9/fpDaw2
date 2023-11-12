<?php

class UserRepository
{

    static function login($u, $p)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM user WHERE name='" . $u . "' AND password=MD5('" . $p . "')");

        if ($datos = $result->fetch_assoc()) {
            return new User($datos);
        } else {
            return null;
        }
    }

    static function registrarse($u, $p, $p2)
    {
        $bd = Conectar::conexion();

        if ($p != $p2) {
            echo "Las contraseñas no coinciden";
        } else {
            $q = 'INSERT INTO user VALUES (null,"' . $u . '",MD5("' . $p . '"),1)';
            $bd->query($q);
        }
    }

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

    public static function getUserById($id) {
        $bd=Conectar::conexion();
        $q="SELECT * FROM user WHERE id='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new User($datos);
        }
    }

    
    public static function updateRolById($rol,$id) {
        $bd = Conectar::conexion();    
        // Actualizar el rol del usuario en la base de datos
        $q = "UPDATE user SET rol = ".$rol." WHERE id= ".$id;
        if ($result = $bd->query($q)) return TRUE;
        else return FALSE;
        
    }
}
