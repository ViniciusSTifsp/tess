<?php

class UsuarioNivelDAO {

    public function atribuiNivel(Connection $con, Nivel $nivel) {
        session_start();
        $query = 'INSERT INTO usuario_nivel (id_nivel,id_usuario) VALUES ("'.$nivel->getId().'","'.$_SESSION['id'].'")';
        return mysqli_query($con->connection(), $query);
    }

}