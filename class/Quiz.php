<?php

class Quiz {

    private $id;
    private $id_usuario;
    private $resposta_correta;
    private $completado;

    public function __construct($id, $id_usuario, $resposta_correta, $completado) {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->resposta_correta = $resposta_correta;
        $this->completado = $completado;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getRespostaCorreta() {
        return $this->resposta_correta;
    }

    public function getCompletado() {
        return $this->completado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setRespostaCorreta($resposta_correta) {
        $this->resposta_correta = $resposta_correta;
    }

    public function setCompletado($completado) {
        $this->completado = $completado;
    }

}