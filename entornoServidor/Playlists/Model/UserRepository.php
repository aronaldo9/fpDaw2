<?php

class UserRepository
{

    static function login($u, $p)
    {
        $bd = Conectar::conexion();
        $result = $bd->query("SELECT * FROM users WHERE username='" . $u . "' AND password=MD5('" . $p . "')");
        var_dump($result);

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
}
