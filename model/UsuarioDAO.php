<?php

class UsuarioDAO {

    public function create(Connection $con, Usuario $usuario) {
        $query = 'INSERT INTO `usuarios` (nome, sobrenome, telefone, email, senha) VALUES (?, ?, ?, ?, ?)';
        $stmt = $con->connection()->prepare($query);
        $stmt->bind_param("sssss", $usuario->getNome(), $usuario->getSobrenome(), $usuario->getTelefone(), $usuario->getEmail(), $usuario->getSenha());
        $stmt->execute();
        $stmt->close();
    }

    public function read(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = ? AND `senha` = ?';
        $stmt = $con->connection()->prepare($query);
        $stmt->bind_param("ss", $usuario->getEmail(), $usuario->getSenha());
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    
    public function update(Connection $con, Usuario $usuario) {
        session_start();
        $query = 'UPDATE `usuarios` SET nome = ?, sobrenome = ?, telefone = ?, email = ? WHERE id = ?';
        $stmt = $con->connection()->prepare($query);
        $stmt->bind_param("ssssi", $usuario->getNome(), $usuario->getSobrenome(), $usuario->getTelefone(), $usuario->getEmail(), $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
    }

    public function delete(Connection $con) {
        session_start();
        $query = 'DELETE FROM `usuarios` WHERE `id` = ?';
        $stmt = $con->connection()->prepare($query);
        $stmt->bind_param("i", $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
    }

    public function verificaEmail(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = ?';
        $stmt = $con->connection()->prepare($query);
        $stmt->bind_param("s", $usuario->getEmail());
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function atualizaLogin(Connection $con) {
        session_start();
        $query = 'UPDATE `usuarios` SET login = ? WHERE id = ?';
        $stmt = $con->connection()->prepare($query);
        $loginStatus = 1;
        $stmt->bind_param("ii", $loginStatus, $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
    }

    public function mudaSenha(Connection $con, Usuario $usuario) {
        session_start();
        $query = 'UPDATE `usuarios` SET senha = ? WHERE id = ?';
        $stmt = $con->connection()->prepare($query);
        $stmt->bind_param("si", $usuario->getSenha(), $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
    }
}
