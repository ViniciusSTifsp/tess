<?php

class PerguntaDAO {

    public function buscaPerguntas(Connection $con) {
        $query = 'SELECT * FROM `perguntas`';
        return mysqli_query($con->connection(), $query);
    }

}