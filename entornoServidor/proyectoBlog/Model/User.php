<?php

class User {
    private $id;
    private $username;
    private $rol;

    public function __construct($datos)
    {
        $this->id = $datos['id_user'];
        $this->username = $datos['username'];
        $this->rol = $datos['rol'];
    }

    public function getId(){
        return $this->id;
    }

    public function getUserName(){
        return $this->username;
    }

    public function getRol(){
        return $this->rol;
    }
}


?>