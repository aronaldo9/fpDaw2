<?php
class Publicacion {
    // titulo, texto,fecha
    private $title = "";
    private $text = "";
    private $date = NULL; // new DateTime
    private $id;


    public function __construct($datos)
    {
        $this->title = $datos['title'];
        $this->text = $datos['text'];
        $this->date = $datos['pubdate'];
        $this->id = $datos['id'];
    }
    

    public function getText(){
        return $this->text;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setText($t) {
        $this->text=$t;
    }
}


?>
