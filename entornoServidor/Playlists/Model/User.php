<?php

class User {
    private $id_user;
    private $username;
    private $rol;
    private $img;

    public function __construct($datos)
    {
        $this->id_user = $datos['id_user'];
        $this->username = $datos['username'];
        $this->rol = $datos['rol'];
        $this->img = $datos['img'];        
    }

    public function getId(){
        return $this->id_user;
    }

    public function getUserName(){
        return $this->username;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getImg() {
        return $this->img;
    }
}


?>