<?php

class Product
{
    private $id;
    private $description;
    private $name;
    private $price;
    private $stock;
    private $img;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->description = $datos['description'];
        $this->name = $datos['name'];
        $this->price = $datos['price'];
        $this->img = $datos['img'];
        $this->stock = $datos['stock'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }
 
    public function getImg()
    {
        return $this->img;
    }
}



?>