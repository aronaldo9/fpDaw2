<?php

class UserRepository{


    public static function getUsers() {
        // consultar a la BD
        $bd=Conectar::conexion();

        $q="SELECT * FROM users";

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


    public static function getUserById($id) {
        $bd=Conectar::conexion();
        $q="SELECT * FROM users WHERE id_user='".$id."'";
        $result=$bd->query($q);
        if($datos=$result->fetch_assoc()){
            return new User($datos);
        }
    }

    
    public static function cambiarRol($userId, $nuevoRol) {
        $bd = Conectar::conexion();
    
        // Actualizar el rol del usuario en la base de datos
        $q = "UPDATE users SET rol = '".$nuevoRol."' WHERE id_user = '".$userId."'";
        $result = $bd->query($q);
    
        // Verificar si la actualización fue exitosa y devolver un mensaje apropiado
        if ($result) {
            return "El rol del usuario ha sido actualizado correctamente.";
        } else {
            return "Error al actualizar el rol del usuario.";
        }
    }
    
    
}
