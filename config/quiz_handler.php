<?php

    require_once('../controllers/QuizController.php');
    require_once('../controllers/UsuarioController.php');
    
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $quizController = new QuizController();
    $quizController->insereQuiz($dados);
    $quizController->defineNivel();

    $usuarioController = new UsuarioController();
    $usuarioController->atualizaCampoLogin();

    header('Location: ../view/home.php');

?>