<?php

class User {
    private $id;
    private $username;
    private $password;
    private $rol;
    private $tickets;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->username = $datos['username'];
        $this->password = $datos['password'];
        $this->rol = $datos['rol'];
        $this->tickets = TicketRepository::getTicketsByUserId($this->id);
    }
 
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getTickets()
    {
        if($this->rol ==1){
            return TicketRepository::getTicketsByUserId($this->id);
        }
        else if ($this->rol == 2) {
            return TicketRepository::getTicketsByWorkerId($this->id);
        }
        else return null;
    }
}


?>