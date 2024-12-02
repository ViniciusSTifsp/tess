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
                $conteudo->setConcluido($dado_conteudo['concluido']);

                if($conteudo->getDia() == 1 && $semana == 1) {
                    
                    echo     '<div class="col-sm conteudo" data-id="'.$conteudo->getDia().'">';
                    $this->card($conteudo->getDia(), $conteudo->getTitulo());
                
                } 
                else {
                    if($semana != 1) {
                        
                        $resultado_semana = $conteudoDAO->getConteudoSemana($conexao, $nivel, $semana - 1);
                        $resultado_dia = $conteudoDAO->getConteudoDia($conexao, $nivel, $semana - 1, $resultado_semana->num_rows);
                        $dia = $resultado_dia->fetch_assoc();

                        //var_dump($dia);

                        if($dia['concluido'] == 1 && $conteudo->getDia() == 1) {
                            echo     '<div class="col-sm conteudo" data-id="'.$conteudo->getDia().'">';
                            $this->card($conteudo->getDia(), $conteudo->getTitulo());
                        }
                        else {
                            $resultado_dia = $conteudoDAO->getConteudoDia($conexao, $nivel, $semana, $conteudo->getDia() - 1);
                            $dia = $resultado_dia->fetch_assoc();
                            
                            if(!is_null($dia)) {
                                if($dia['concluido'] == 1) {
                                    echo     '<div class="col-sm conteudo" data-id="'.$conteudo->getDia().'">';
                                    $this->card($conteudo->getDia(), $conteudo->getTitulo());
                                }
                                else {
                                    echo     '<div class="col-sm" data-id="'.$conteudo->getDia().'">';
                                    $this->card($conteudo->getDia(), $conteudo->getTitulo());
                                }
                            }
                            else {
                                echo     '<div class="col-sm" data-id="'.$conteudo->getDia().'">';
                                $this->card($conteudo->getDia(), $conteudo->getTitulo());
                            }
                        }
                    }
                    else {
                        $resultado_dia = $conteudoDAO->getConteudoDia($conexao, $nivel, $semana, $conteudo->getDia() - 1);
                        $dia = $resultado_dia->fetch_assoc();
                        
                        if($dia['concluido'] == 1) {
                            
                            echo     '<div class="col-sm conteudo" data-id="'.$conteudo->getDia().'">';
                            $this->card($conteudo->getDia(), $conteudo->getTitulo());
                        }
                        else {
                            echo     '<div class="col-sm" data-id="'.$conteudo->getDia().'">';
                            $this->card($conteudo->getDia(), $conteudo->getTitulo());
                        }
                    }
                }
                
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

        $conteudo->setId($dado_conteudo['id']);
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

    public function concluiConteudo($id) {

        $conexao = new Connection();
        $conteudoDAO = new ConteudoDAO();

        $resultado = $conteudoDAO->setConcluido($conexao, $id);

        if($resultado) {
            return "Contéudo concluído com sucesso!";
        }
        else {
            return "Falha ao concluir conteúdo!";
        }

    }

    private function card($dia, $titulo) {
        echo            '<div class="card h-100">';
        echo                '<div class="card-body">';
        echo                    '<h5 class="card-title fw-bold">Dia '.$dia.'</h5>';
        echo                    '<p class="card-text">'.$titulo.'</p>';
        echo                '</div>';
        echo            '</div>';
        echo        '</div>';
    }

}

    