<?php

require_once('../class/Usuario.php');
require_once('../model/UsuarioDAO.php');
require_once('../config/Connection.php');

class UsuarioController {

    public function cadastrar($nome, $email, $senha) {
        $conexao = new Connection();
        $usuario = new Usuario($nome, $email, $senha);
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);
        
        if(!$resultado->num_rows){
            $usuarioDAO->create($conexao, $usuario);
            header('Location: ../view/login.php');
        }
        else {
            echo "<script>alert('Esse email já está cadastrado!')</script>";
        }
        
    }

    public function login($nome, $senha) {
        
    }

}