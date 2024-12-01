<?php

require_once('../class/Usuario.php');
require_once('../controllers/AdminController.php');
$usuario = new Usuario();
$admin = new AdminController();

if(isset($_REQUEST['submit'])) {
    $usuario->setId($_REQUEST['id']);
    $usuario->setNome($_REQUEST['nome']);
    $usuario->setSobrenome($_REQUEST['sobrenome']);
    $usuario->setTelefone($_REQUEST['telefone']);
    $usuario->setEmail($_REQUEST['email']);
    $usuario->setAdmin($_REQUEST['admin']);

    $admin->editaUsuario($usuario);
}
else {
    header('Location: ../view');
}