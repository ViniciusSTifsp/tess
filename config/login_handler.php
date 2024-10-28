<?php

    require_once('../controllers/UsuarioController.php');

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuarioController = new UsuarioController();
        $usuarioController->login($email, $senha);

    }
?>
