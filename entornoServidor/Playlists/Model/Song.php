<?php
class Song {
    // titulo, texto,fecha
    private $id_song;
    private $title = "";
    private $duration = "";
    private $author = "";
    private $img="";
    private $file="";
    private $user_id="";


    public function __construct($datos)
    {
        $this->id_song = $datos['id_song'];
        $this->title = $datos['title'];
        $this->duration = $datos['duration'];
        $this->author = $datos['author'];
        $this->img = $datos['img'];
        $this->file = $datos['file'];
        $this->user_id = $datos['user_id'];
        //$this->songs = SongRepository::getSongsById($datos['id']);
    }
}

?>