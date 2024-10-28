<?php

class Nivel {

    private $id;
    private $nivel;

    public function __construct($id, $nivel) {
        $this->id = $id;
        $this->nivel = $nivel;
    }

    public function getId() {
        return $this->id;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

}