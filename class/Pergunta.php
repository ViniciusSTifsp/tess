<?php

class Pergunta {

    private $id;
    private $pergunta;

    public function __construct($id, $pergunta) {
        $this->id = $id;
        $this->pergunta = $pergunta;
    }

    public function getId() {
        return $this->id;
    }

    public function getPergunta() {
        return $this->pergunta;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

}