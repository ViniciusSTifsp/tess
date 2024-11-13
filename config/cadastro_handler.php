<?php
    require_once('../controllers/UsuarioController.php');

    if (isset($_REQUEST['submit'])) {
        $nome = $_REQUEST['nome'];
        $email = $_REQUEST['email'];
        $senha = $_REQUEST['senha'];

        $usuarioController = new UsuarioController();
        $usuarioController->cadastrar($nome, $email, $senha);
    }