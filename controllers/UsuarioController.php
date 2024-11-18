<?php

require_once('../class/Usuario.php');
require_once('../model/UsuarioDAO.php');
require_once('../config/Connection.php');

class UsuarioController {

    public function cadastrar($nome, $sobrenome, $telefone, $email, $senha) {
        $conexao = new Connection();
        $usuario = new Usuario($nome, $sobrenome, $telefone, $email, $senha);
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
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);

        if($resultado->num_rows){
            session_start();

            $user = $resultado->fetch_assoc();

            $pwd_hashed = $user['senha']; // Supondo que a coluna com a senha hash seja 'senha'

            if(password_verify($senha, $pwd_hashed)) {
                if ($user['admin']) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['nome'] = $user['nome'];
                    $_SESSION['admin'] = $user['admin'];
                    $_SESSION['email'] = $email;
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
            else {
                header('Location: ../view/login.php?msg=E-mail ou senha incorretos.');
            }
        }
        else {
           header('Location: ../view/login.php?msg=Email ou senha incorretos!');
        }
    }

    public function atualizaCampoLogin() {
        $conexao = new Connection();
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->atualizaLogin($conexao);
    }

    public function info(){
        $conexao = new Connection();
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();

        $usuario->setEmail($_SESSION['email']);

        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);

        $dado = $resultado->fetch_assoc();

        $usuario->setNome($dado['nome']);
        $usuario->setSobrenome($dado['sobrenome']);
        $usuario->setTelefone($dado['telefone']);

        return $usuario;

    }

    public function atualizaCadastro($nome, $sobrenome, $telefone, $email){
        
        $conexao = new Connection();
        $usuario = new Usuario($nome, $sobrenome, $telefone, $email, null);
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->update($conexao, $usuario);

        var_dump($resultado);

        if($resultado) {
            header('Location: ../view/profile');
        }
        else {
            header('Location: ../view/profile?msg=falha');
        }
        
    }

    public function atualizaSenha($email, $senha_atual, $senha) {
        
        $conexao = new Connection();
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);

        if(!$resultado->num_rows) {
            header('Location: ../view/profile.php?msg=Usuário Incorreto!');
        }
        else {
            $user = $resultado->fetch_assoc();
            $senha_hash = $user['senha'];

            if(password_verify($senha_atual, $senha_hash)) {
                $usuarioDAO->mudaSenha($conexao, $usuario);
                header('Location: ../view/profile.php?msg=Senha alterada com sucesso!');
            }
            else {
                header('Location: ../view/profile.php?msg=Senha Incorreta!');
            }            
        }

    }

    public function logout(){
        session_start();
        
        session_destroy();
    }

}