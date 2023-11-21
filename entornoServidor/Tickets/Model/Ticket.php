<?php

class Ticket {

    private $id, $title, $text, $state, $userId, $workerId, $responses, $valoration;

    public function __construct($datos){
        $this->id=$datos['id'];
        $this->title=$datos['title'];
        $this->text=$datos['text'];
        $this->state=$datos['state'];
        $this->userId=$datos['user_id'];
        $this->workerId=$datos['worker_id'];
        $this->valoration=$datos['valoration'];
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getText(){
        return $this->text;
    }
    public function getState(){
        return $this->state;
    }

    public function addResponse($text){
        ResponseRepository::newResponse($this->id, $text);
    }

    public function setWorker($id){
        $this->workerId=$id;
        TicketRepository::assignWorker($this->id, $id);
    }

    public function getResponses(){
        return ResponseRepository::getResponsesByTicketId($this->id);
    }

    public function getValoration(){
        return $this->valoration;
    }
    public function close(){
        $this->state=1;
        TicketRepository::close($this->id);
    }

    
    public function setValoration($v){
        $this->valoration=$v;
        TicketRepository::setVal($this->id, $v);
    }
}

?>