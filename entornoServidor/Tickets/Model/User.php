<?php
class User{
    private $id, $username, $rol, $tickets;

    public function __construct($datos){
        $this->id=$datos['id'];
        $this->username=$datos['username'];
        $this->rol=$datos['rol'];
    }
    public function getUsername(){
        return $this->username;
    }
    public function getRol(){
        return $this->rol;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getTickets(){
        if($this->rol==1)
            return TicketRepository::getTicketsByUserId($this->id);
        else if ($this->rol==2)
            return TicketRepository::getTicketsByWorkerId($this->id);
        else return NULL;
    }

    public function __toString(){
        return $this->username;
    }


}

?>