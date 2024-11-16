<?php

class Conteudo {
    
    private $id;
    private $id_nivel;
    private $nivel;
    private $semana;
    private $dia;
    private $titulo;
    private $descricao;
    private $concluido;

    public function __construct($id = null, $id_nivel = null, $semana = null, $dia = null, $titulo = null, $descricao = null, $concluido = null) {
        
        $this->id = $id;
        $this->id_nivel = $id_nivel;
        $this->semana = $semana;
        $this->dia = $dia;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->concluido = $concluido;

    }

    public function getId() {
        return $this->id;
    }

    public function getIdNivel() {
        return $this->id_nivel;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function getSemana() {
        return $this->semana;
    }

    public function getDia() {
        return $this->dia;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getConcluido() {
        return $this->concluido;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdNivel($id_nivel) {
        $this->id_nivel = $id_nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function setSemana($semana) {
        $this->semana = $semana;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setConcluido($concluido) {
        $this->concluido = $concluido;
    }

}