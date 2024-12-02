<?php

class ConteudoDAO {

    public function getConteudoSemana(Connection $con, Nivel $nivel, $semana) {
        $query = 'SELECT * FROM conteudo WHERE id_nivel = '.$nivel->getId().' AND semana = '.$semana;
        return mysqli_query($con->connection(), $query);
    }

    public function getConteudoDia(Connection $con, Nivel $nivel, $semana, $dia) {
        $query = 'SELECT * FROM conteudo WHERE id_nivel = '.$nivel->getId().' AND semana = '.$semana.' AND dia = '.$dia;
        return mysqli_query($con->connection(), $query);
    }

    public function setConcluido(Connection $con, $id) {
        $query = 'UPDATE conteudo SET concluido = 1 WHERE id = '.$id;
        return mysqli_query($con->connection(), $query);
    }

}