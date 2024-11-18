<?php

class UsuarioDAO {

    public function create(Connection $con, Usuario $usuario) {
        $query = 'INSERT INTO `usuarios` (nome, sobrenome, telefone, email, senha) VALUES ("'.$usuario->getNome().'", "'.$usuario->getSobrenome().'", "'.$usuario->getTelefone().'", "'.$usuario->getEmail().'","'.$usuario->getSenha().'")';
        mysqli_query($con->connection(), $query);
    }

    public function read(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = "'.$usuario->getEmail().'" AND `senha` = "'.$usuario->getSenha().'"';
        return mysqli_query($con->connection(), $query);
    }
    
    public function update(Connection $con, Usuario $usuario) {
        session_start();
        $query = 'UPDATE 
                    usuarios 
                  SET 
                      nome = "'.$usuario->getNome().'"'.
                    ',sobrenome = "'.$usuario->getSobrenome().'"'.
                    ',telefone = "'.$usuario->getTelefone().'"'.
                    ',email = "'.$usuario->getEmail().'"'.
                  'WHERE
                    id = '.$_SESSION['id'];
        return mysqli_query($con->connection(), $query);
    }

    public function delete(Connection $con) {
        $query = 'DELETE FROM `usuarios` WHERE `id` = '.$_SESSION['id'];
        return mysqli_query($con->connection(), $query);
    }

    public function verificaEmail(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = "'.$usuario->getEmail().'"';
        return mysqli_query($con->connection(), $query);
    }

    public function atualizaLogin(Connection $con) {
        session_start();
        $query = 'UPDATE usuarios SET login = "1" WHERE id = "'.$_SESSION['id'].'"';
        return mysqli_query($con->connection(), $query);
    }

    public function mudaSenha(Connection $con, Usuario $usuario) {
        $query = 'UPDATE
                     usuarios
                 SET
                     senha = "'.$usuario->getSenha().'"'.
                 'WHERE
                     id = '.$_SESSION['id'];
        return mysqli_query($con->connection(), $query);
    }

}