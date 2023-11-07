<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $rol;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->username = $datos['username'];
        $this->password = $datos['password'];
        $this->rol = $datos['rol'];
    }

    function getId()
    {
        return $this->id;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getRol()
    {
        return $this->rol;
    }
    public function getListasFavs()
    {
        $listasFav = ListaRepository::mostrarListasFavByUser($this->id);
        return $listasFav;
    }
}
