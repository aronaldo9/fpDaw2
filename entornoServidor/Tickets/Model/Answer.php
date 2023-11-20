<?php

class Answer {
    private $id;
    private $ticketId;
    private $text;
    private $userId;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->ticketId = $datos['ticketId'];
        $this->text = $datos['text'];
        $this->userId = $datos['userId'];
    }

    public function getId() {
        return $this->id;
    }

    public function getTicketId() {
        return $this->ticketId;
    }

    public function getText() {
        return $this->text;
    }

    public function getUserId() {
        return $this->userId;
    }
}

?>