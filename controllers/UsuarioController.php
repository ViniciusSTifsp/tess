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

    public function login($email, $senha) {
        $conexao = new Connection();
        $usuario = new Usuario(null, $email, $senha);
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);

        if($resultado->num_rows){
            session_start();

            $user = $resultado->fetch_assoc();

            $pwd_hashed = $user['senha']; // Supondo que a coluna com a senha hash seja 'senha'

            if(password_verify($senha, $pwd_hashed)) {
                if ($user['admin']) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['nome'] = $user['nome'];
                    $_SESSION['admin'] = $email;
                    header('Location: ../view/sistema.php');
                } else{
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['nome'] = $user['nome'];
                    $_SESSION['email'] = $email;
                    if (!$user['login']) {
                        header('Location: ../view/quiz.php');
                    }
                    else{
                        header('Location: ../view/home.php');
                    }
                }
            }
        }
        else {
            header('Location: ../view/home.php');
        }
    }

    public function atualizaCampoLogin() {
        $conexao = new Connection();
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->atualizaLogin($conexao);
    }

    public function logout(){
        session_start();
        
        session_destroy();
    }

}