<?php

require_once('../class/Nivel.php');
require_once('../model/UsuarioNivelDAO.php');
require_once('../config/Connection.php');

class UsuarioNivelController {
    
    public function buscaUsuarioNivel() {
        
        $conexao = new Connection();
        $usuarioNivelDAO = new UsuarioNivelDAO();

        $resultado_usuario_nivel = $usuarioNivelDAO->consultaNivel($conexao);

        $dado_usuario_nivel = $resultado_usuario_nivel->fetch_assoc();

        return $nivel = new Nivel($dado_usuario_nivel['id'], $dado_usuario_nivel['nivel']);

    }
}