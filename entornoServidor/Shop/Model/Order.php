<?php

class Order {
    private $id;
    private $userId;
    private $state;
    private $date;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->userId = $data['idUser'];
        $this->state = $data['state'];
        $this->date = $data['date'];
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getState() {
        return $this->state;
    }

    public function getDate() {
        return $this->date;
    }
}

?>
