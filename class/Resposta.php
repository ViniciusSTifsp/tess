<?php

class Resposta {

    private $id;
    private $id_pergunta;
    private $resposta;
    private $correta;

    public function __construct($id, $id_pergunta, $resposta, $correta) {
        $this->id = $id;
        $this->id_pergunta = $id_pergunta;
        $this->resposta = $resposta;
        $this->correta = $correta;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdPergunta() {
        return $this->id_pergunta;
    }

    public function getResposta() {
        return $this->resposta;
    }

    public function getCorreta() {
        return $this->correta;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdPergunta($id_pergunta) {
        $this->id_pergunta = $id_pergunta;
    }

    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }

    public function setCorreta($correta) {
        $this->correta = $correta;
    }

}