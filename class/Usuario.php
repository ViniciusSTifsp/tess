<?php

class Usuario {

    private $id;
    private $nome;
    private $sobrenome;
    private $telefone;
    private $email;
    private $senha;
    private $admin;

    function __construct($nome = null, $sobrenome = null, $telefone = null, $email = null, $senha = null) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }
    

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return  str_replace("\'",'', $this->senha);
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function setId ($id) {
        $this->id = $id;
    }

    public function setNome ($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome ($sobrenome) {
        $this->sobrenome = $sobrenome;
    }
    
    public function setTelefone ($telefone) {
        $this->telefone = $telefone;
    }

    public function setEmail ($email) {
        $this->email = $email;
    }

    public function setSenha ($senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function setAdmin ($admin) {
        $this->admin = $admin;
    }

}