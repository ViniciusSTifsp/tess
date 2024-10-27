<?php
    require_once('../controllers/UsuarioController.php');

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuarioController = new UsuarioController();
        $usuarioController->cadastrar($nome, $email, $senha);
    }