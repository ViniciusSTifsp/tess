<?php
require_once ('../controllers/UsuarioNivelController.php');

$usuarioNivelController = new UsuarioNivelController();

$teste = $usuarioNivelController->buscaUsuarioNivel();

echo '<p>Parabéns '.$_SESSION['nome'].' seu nível é '.$teste->getNivel().'!</p>';