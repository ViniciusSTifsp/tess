<?php
    require_once('../controllers/UsuarioController.php');

    if (isset($_REQUEST['submit'])) {
        $nome = $_REQUEST['nome'];
        $sobrenome = $_REQUEST['sobrenome'];
        $telefone = $_REQUEST['telefone'];
        $email = $_REQUEST['email'];
        $senha = $_REQUEST['senha'];
        

        $usuarioController = new UsuarioController();
        $usuarioController->cadastrar($nome, $sobrenome, $telefone, $email, $senha);
    }