<?php

class Spotify {

    private $client_id = 'd89de3f72a3047b495d05c36670b5535';
    private $client_secret = '6a5e024160594956b1974af40452e78c';

    private $usuario;
    private $nome;
    private $img;
    private $url;

    public function __construct($usuario = null, $nome = null, $img = null, $url = null) {

        $this->usuario = $usuario;
        $this->nome = $nome;
        $this->img = $img;
        $this->url = $url;

    }

    public function getClientId() {
        return $this->client_id;
    }

    public function getClientSecret() {
        return $this->client_secret;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getImg() {
        return $this->img;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

}