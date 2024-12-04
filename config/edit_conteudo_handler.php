<?php

require_once('../class/Conteudo.php');
require_once('../controllers/AdminController.php');
$conteudo = new Conteudo();
$admin = new AdminController();

if(isset($_REQUEST['submit'])) {
    $conteudo->setId($_REQUEST['id']);
    $conteudo->setTitulo($_REQUEST['titulo']);
    $conteudo->setDescricao($_REQUEST['descricao']);

    $admin->editaConteudo($conteudo);
}
else {
    header('Location: ../view');
}