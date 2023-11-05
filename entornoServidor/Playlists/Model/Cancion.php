<?php

class Cancion
{
    private $id;
    private $titulo;
    private $autor;
    private $duracion;
    private $img;
    private $idUser;
    private $archivo;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->titulo = $datos['title'];
        $this->autor = $datos['autor'];
        $this->duracion = $datos['duration'];
        $this->img = $datos['img'];
        $this->idUser = $datos['idUser'];
        $this->archivo = $datos['mp3'];
    }

    function getName()
    {
        return $this->titulo;
    }

    function getAutor()
    {
        return $this->autor;
    }

    function getArchivo()
    {
        return $this->archivo;
    }

    function getImg()
    {
        return $this->img;
    }


    function getId()
    {
        return $this->id;
    }
}
