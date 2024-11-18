<?php

require_once('../class/Conteudo.php');
require_once('../model/ConteudoDAO.php');
require_once('../class/Nivel.php');
require_once('../model/UsuarioNivelDAO.php');
require_once('../config/Connection.php');

class ConteudoController {
    
    public function geraCardsConteudo($semana) {

        $conexao = new Connection();
        $conteudo = new Conteudo(); 
        $usuarioNivelDAO = new UsuarioNivelDAO();

        $resultado_usuarioNivel = $usuarioNivelDAO->consultaNivel($conexao);

        $usuarioNivel = $resultado_usuarioNivel->fetch_assoc();

        $nivel = new Nivel($usuarioNivel['id'], $usuarioNivel['nivel']);

        $conteudoDAO = new ConteudoDAO();

        $resultado_conteudo = $conteudoDAO->getConteudoSemana($conexao, $nivel, $semana);

        if($resultado_conteudo->num_rows > 0) {

            echo '<div class="container">';
            echo     '<div class="row gy-4">';

            while ($dado_conteudo = $resultado_conteudo->fetch_assoc()) {

                $conteudo->setDia($dado_conteudo['dia']);
                $conteudo->setTitulo($dado_conteudo['titulo']);

                echo     '<div class="col-sm conteudo" data-id="'.$conteudo->getDia().'">';
                echo         '<div class="card h-100">';
                echo             '<div class="card-body">';
                echo                 '<h5 class="card-title fw-bold">Dia '.$conteudo->getDia().'</h5>';
                echo                 '<p class="card-text">'.$conteudo->getTitulo().'</p>';
                echo             '</div>';
                echo         '</div>';
                echo     '</div>';
            }

            echo     '</div>';
            echo '</div>';

        }
    }

    public function conteudoModal($semana, $dia){

        session_start();
        
        $conexao = new Connection();
        $conteudo = new Conteudo(); 
        $usuarioNivelDAO = new UsuarioNivelDAO();

        $resultado_usuarioNivel = $usuarioNivelDAO->consultaNivel($conexao);

        $usuarioNivel = $resultado_usuarioNivel->fetch_assoc();

        $nivel = new Nivel($usuarioNivel['id'], $usuarioNivel['nivel']);

        $conteudoDAO = new ConteudoDAO();

        $resultado_conteudo = $conteudoDAO->getConteudoDia($conexao, $nivel, $semana, $dia);

        $dado_conteudo = $resultado_conteudo->fetch_assoc();

        $conteudo->setTitulo($dado_conteudo['titulo']);
        $conteudo->setDescricao($dado_conteudo['descricao']);
        $conteudo->setConcluido($dado_conteudo['concluido']);

        $reflectionClass = new ReflectionClass(get_class($conteudo));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($conteudo);
            $property->setAccessible(false);
        }

        return $array;

    }

}

    