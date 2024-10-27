<?php

class UsuarioDAO {

    public function create(Connection $con, Usuario $usuario) {
        $query = 'INSERT INTO `usuarios` (nome, email, senha) VALUES ("'.$usuario->getNome().'", "'.$usuario->getEmail().'","'.$usuario->getSenha().'")';
        mysqli_query($con->connection(), $query);
    }

    public function read(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = "'.$usuario->getEmail().'" AND `senha` = "'.$usuario->getSenha().'"';
        return mysqli_query($con->connection(), $query);
    }

    public function verificaEmail(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = "'.$usuario->getEmail().'"';
        return mysqli_query($con->connection(), $query);
    }

}