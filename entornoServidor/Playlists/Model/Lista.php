<?php
class Lista
{
    private $id;
    private $nombre;
    private $idUser;
    private $canciones;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->nombre = $datos['name'];
        $this->idUser = $datos['idUser'];
        $this->canciones = ListaRepository::rellenarCanciones($datos['id']);
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->nombre;
    }

    function getCanciones()
    {
        return $this->canciones;
    }
}
