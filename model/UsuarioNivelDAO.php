<?php

class UsuarioNivelDAO {

    public function atribuiNivel(Connection $con, Nivel $nivel) {
        session_start();
        $query = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$nivel->getId().'","'.$_SESSION['id'].'")';
        return mysqli_query($con->connection(), $query);
    }

    public function consultaNivel(Connection $con) {
        session_start();
        $query = 'SELECT N.id, N.nivel FROM usuario_nivel AS UN JOIN usuarios AS U ON UN.id_usuario = U.id JOIN nivel AS N ON UN.id_nivel = N.id WHERE U.id = "'.$_SESSION['id'].'"';
        return mysqli_query($con->connection(), $query);
    }
    
}