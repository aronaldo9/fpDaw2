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


}

?>