<?php

class Ticket {
    private $id;
    private $title;
    private $text;
    private $state;
    private $user_id;
    private $answers;
    private $rating;

    function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->title = $datos['title'];
        $this->text = $datos['text'];
        $this->state = $datos['state'];
        $this->user_id = $datos['user_id'];
        $this->answers = AnswerRepository::getAnswersByTicketId($this->id);
        $this->rating = $datos['rating'];
    }

    public function getId()
    {
        return $this->id;
    }
 
    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
    }
 
    public function getState()
    {
        return $this->state;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function addAnswer($text) {
        AnswerRepository::newAnswer($this->id,$text);
    }
}



?>