<?php

class Comment {
    private $id;
    private $user_id;
    private $pub_id;
    private $comment;
    private $commentDate;


    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->comment = $datos['comment'];
        $this->commentDate = $datos['commentDate'];

        $this->user_id = UserRepository::getUserById($datos['user_id']);
    }

    
    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getPub_id()
    {
        return $this->pub_id;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function getId()
    {
        return $this->id;
    }
}




?>