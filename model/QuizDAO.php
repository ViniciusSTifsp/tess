<?php

class QuizDAO {

    public function insereQuiz(Connection $con, $resultado) {
        session_start();
        $query = 'INSERT INTO quiz (id_usuario,resposta_correta,completado) VALUES ('.$_SESSION['id'].','.$resultado.',1)';
        return mysqli_query($con->connection(), $query);
    }

    public function buscaQuiz(Connection $con) {
        session_start();
        $query = 'SELECT * FROM `quiz` WHERE `id_usuario` = '.$_SESSION['id'];
        return mysqli_query($con->connection(), $query);
    }

}