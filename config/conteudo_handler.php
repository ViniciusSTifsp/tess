<?php

    require_once('../controllers/ConteudoController.php');

    $conteudoController = new ConteudoController();

    if(isset($_POST['dia'])) {
        $dia = $_POST['dia'];
        $semana = $_POST['semana'];

        $resultado = $conteudoController->conteudoModal($semana, $dia);

        if($resultado) {
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
        else {
            echo "Teste";
        }
        
    }