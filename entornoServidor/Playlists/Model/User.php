<?php

class User
{
    private $id_user;
    private $username;
    private $password;
    private $rol;

    function __construct($datos)
    {
        $this->id = $datos['id_user'];
        $this->username = $datos['username'];
        $this->password = $datos['password'];
        $this->rol = $datos['rol'];
    }

    function getId()
    {
        return $this->id_user;
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
        $listasFav = ListaRepository::mostrarListasFavByUser($this->id_user);
        return $listasFav;
    }
}
