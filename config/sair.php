<?php
    require_once('../controllers/UsuarioController.php');

    $usuarioController = new UsuarioController();
    $usuarioController->logout();

    header("Location: ../view/index.php");
?>