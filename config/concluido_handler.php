<?php

    require_once('../controllers/ConteudoController.php');

    $conteudoController = new ConteudoController();

    if(isset($_POST['id'])) {
        
        $id = $_POST['id'];

        $resultado = $conteudoController->concluiConteudo($id);

        echo $resultado;
        
    }