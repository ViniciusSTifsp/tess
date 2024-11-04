<?php

class ConteudoDAO {

    public function getConteudo(Connection $con, Nivel $nivel) {
        $query = 'SELECT * FROM conteudo WHERE id_nivel = '.$nivel->getId();
        return mysqli_query($con->connection(), $query);
    }

    public function getConteudoNivel(Connection $con, Conteudo $conteudo) {
        $query = 'SELECT C.*, N.nivel FROM conteudo AS C INNER JOIN nivel AS N ON N.id = C.id_nivel WHERE N.nivel = '.$conteudo->getNivel();
        return mysqli_query($con->connection(), $query);
    }

}