<?php

class AdminDAO {

    public function getAllUsers(Connection $con) {
        $query = 'SELECT * FROM usuarios';
        return mysqli_query($con->connection(), $query);
    }

    public function getUser(Connection $con, $id) {
        $query = 'SELECT * FROM usuarios WHERE id = '.$id;
        return mysqli_query($con->connection(), $query);
    }

    public function updateUser(Connection $con, Usuario $usuario) {
        $query = 'UPDATE 
                     usuarios
                 SET
                    nome = "'.$usuario->getNome().'"'.
                    ',sobrenome = "'.$usuario->getSobrenome().'"'.
                    ',telefone = "'.$usuario->getTelefone().'"'.
                    ',email = "'.$usuario->getEmail().'"'.
                    ',admin = "'.$usuario->getAdmin().'"'.
                 'WHERE
                     id = "'.$usuario->getId().'"';
        return mysqli_query($con->connection(), $query);
    }

}