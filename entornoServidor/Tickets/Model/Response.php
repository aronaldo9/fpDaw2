<?php

class Response{

    private $id, $text, $ticketId, $authorId;

    public function __construct($datos){
        $this->id=$datos['id'];
        $this->text=$datos['text'];
        $this->ticketId=$datos['id_ticket'];
        $this->authorId=$datos['id_author'];
    }

    public function getText(){
        return $this->text;
    }

    public function getAuthor(){
        return UserRepository::getUserById($this->authorId);
    }

    public function toJson() {
        return get_object_vars($this);
    }

}

?>