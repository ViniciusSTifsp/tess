<?php
    require_once('../controllers/UsuarioController.php');

    if(isset($_REQUEST['submit'])) {
        
        session_start();
        
        $email = $_SESSION['email'];
        $senha_atual = $_REQUEST['senhaAtual'];
        $senha = $_REQUEST['senha'];
        $confirmar_senha = $_REQUEST['confirmarSenha'];

        if($senha === $confirmar_senha) {
            $usuarioController = new UsuarioController();
            $usuarioController->atualizaSenha($email, $senha_atual, $senha);
        }
        else {
            header('Location: ../view/profile.php?msg=Senhas não coincidem!');
        }

    }