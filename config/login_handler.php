<?php

    require_once('../controllers/UsuarioController.php');

    if(isset($_REQUEST['submit']) && !empty($_REQUEST['email']) && !empty($_REQUEST['senha'])) {
        $email = $_REQUEST['email'];
        $senha = $_REQUEST['senha'];

        $usuarioController = new UsuarioController();
        $usuarioController->login($email, $senha);

    } else {
        // header('Location: ../view/home.php');
        header('Location: ../view/login.php?msg=Usuário ou senha incorretos.');
     }
?>
