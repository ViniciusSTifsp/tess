<?php

class Usuario {

    private $nome;
    private $email;
    private $senha;

    function __construct($nome = null, $email = null, $senha = null) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return  str_replace("\'",'', $this->senha); ;
    }

    public function setNome ($nome) {
        $this->nome = $nome;
    }

    public function setEmail ($email) {
        $this->email = $email;
    }

    public function setSenha ($senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

}