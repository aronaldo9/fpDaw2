<?php

class Line
{
    private $id;
    private $idProduct;
    private $idOrder;
    private $price;
    private $unities;

    function __construct($datos)
    {
       $this->id = $datos['id']; 
       $this->idProduct = $datos['idProduct']; 
       $this->idOrder = $datos['idOrder']; 
       $this->price = $datos['price']; 
       $this->unities = $datos['unities']; 
    }
}


?>