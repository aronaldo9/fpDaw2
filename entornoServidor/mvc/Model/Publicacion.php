<?php
class Publicacion {
    // titulo, texto,fecha
    private $id;
    private $title = "";
    private $text = "";
    private $img = "";
    private $date = NULL; // new DateTime
    private $comments;


    public function __construct($datos)
    {
        $this->id = $datos['id'];
        $this->title = $datos['title'];
        $this->text = $datos['text'];
        $this->date = $datos['pubdate'];
        $this->img = $datos['img'];
        $this->comments = CommentRepository::getCommentsByPubId($datos['id']);
    }
    

    public function getText(){
        return $this->text;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setText($t) {
        $this->text=$t;
    }

    public function getImage(){
        return $this->img;
    }

    public function getId()
    {
        return $this->id;
    }
}


?>
