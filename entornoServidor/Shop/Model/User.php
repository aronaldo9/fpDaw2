<?php

class User 
{
    private $id;
    private $name;
    private $password;
    private $rol;
    private $orders;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->name = $datos['name'];
        $this->password = $datos['password'];
        $this->rol = $datos['rol'];
        $this->orders = [];
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }
 
    public function getRol()
    {
        return $this->rol;
    }

    public function getOrders()
    {
        return $this->orders;
    }
}


?>