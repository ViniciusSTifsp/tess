<?php

class RespostaDAO {

    public function buscaRespostas(Connection $con, Pergunta $pergunta) {
        $query = 'SELECT * FROM `respostas` WHERE `id_pergunta` = "'.$pergunta->getId().'"';
        return mysqli_query($con->connection(), $query);
    }

}