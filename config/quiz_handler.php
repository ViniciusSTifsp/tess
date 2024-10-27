<?php
    session_start();
    include_once('../config/config.php');

    $sql = 'UPDATE usuarios SET login = "1" WHERE id = "'.$_SESSION['id'].'"';
    $result = $conexao->query($sql); 
    
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    $resultado = 0;
    foreach($dados as $dado){
        if($dado == 1){
            $resultado++;
        }
    }

    $sql = "INSERT INTO quiz (id_usuario,resposta_correta,completado) VALUES (".$_SESSION['id'].",".$resultado.",1)";
    $result = $conexao->query($sql);

    $sql = "SELECT * FROM quiz WHERE id_usuario = ".$_SESSION['id'];
    $result_quiz = $conexao->query($sql);
    $quiz = $result_quiz->fetch_assoc();

    function define_nivel($conexao, $base){
        $sql = 'SELECT * FROM `nivel` WHERE `nivel` = "'.$base.'"';
        $result_nivel = $conexao->query($sql);
        $nivel = $result_nivel->fetch_assoc();
        return $nivel;
    }

    if($quiz['resposta_correta'] <= 4) {
        $level = define_nivel($conexao, "A1");
        $sql = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$level['id'].'","'.$_SESSION['id'].'")';
        $result = $conexao->query($sql);
    }
    elseif($quiz['resposta_correta'] >= 5 && $quiz['resposta_correta'] <= 8) {
        $level = define_nivel($conexao, "A2");
        $sql = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$level['id'].'","'.$_SESSION['id'].'")';
        $result = $conexao->query($sql);
    }
    elseif($quiz['resposta_correta'] >= 9 && $quiz['resposta_correta'] <= 12) {
        $level = define_nivel($conexao, "B1");
        $sql = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$level['id'].'","'.$_SESSION['id'].'")';
        $result = $conexao->query($sql);
    }
    elseif($quiz['resposta_correta'] >= 13 && $quiz['resposta_correta'] <= 16) {
        $level = define_nivel($conexao, "B2");
        $sql = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$level['id'].'","'.$_SESSION['id'].'")';
        $result = $conexao->query($sql);
    }
    elseif($quiz['resposta_correta'] >= 17 && $quiz['resposta_correta'] <= 20) {
        $level = define_nivel($conexao, "C1");
        $sql = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$level['id'].'","'.$_SESSION['id'].'")';
        $result = $conexao->query($sql);
    }
    else{
        $level = define_nivel($conexao, "C2");
        $sql = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$level['id'].'","'.$_SESSION['id'].'")';
        $result = $conexao->query($sql);
    }

    header('Location: ../view/home.php');
?>