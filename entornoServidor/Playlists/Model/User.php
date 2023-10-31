<?php

class User {
    private $id_user;
    private $username;
    private $password;
    private $rol;

    public function __construct($datos)
    {
        $this->id_user = $datos['id_user'];
        $this->username = $datos['username'];
        $this->password = $datos['password'];
        $this->rol = $datos['rol'];       
    }

    public function getId(){
        return $this->id_user;
    }

    public function getUserName(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRol(){
        return $this->rol;
    }

}


?>