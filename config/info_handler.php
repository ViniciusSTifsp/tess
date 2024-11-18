<?php
    require_once('../controllers/UsuarioController.php');

    if (isset($_REQUEST['submit'])) {
        $nome = $_REQUEST['nome'];
        $sobrenome = $_REQUEST['sobrenome'];
        $telefone = $_REQUEST['telefone'];
        $email = $_REQUEST['email'];

        $usuarioController = new UsuarioController();
        $usuarioController->atualizaCadastro($nome, $sobrenome, $telefone, $email);
    }