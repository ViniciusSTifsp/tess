<?php

require_once('../class/Pergunta.php');
require_once('../model/PerguntaDAO.php');
require_once('../class/Resposta.php');
require_once('../model/RespostaDAO.php');
require_once('../class/Quiz.php');
require_once('../model/QuizDAO.php');
require_once('../class/Nivel.php');
require_once('../model/NivelDAO.php');
require_once('../model/UsuarioNivelDAO.php');
require_once('../config/Connection.php');

class QuizController {

    public function geraQuiz() {
        
        $conexao = new Connection();
        $perguntaDAO = new PerguntaDAO();
        $respostaDAO = new RespostaDAO();

        $resultado_perguntas = $perguntaDAO->buscaPerguntas($conexao);

        $cont = 1;

        if($resultado_perguntas->num_rows > 0) {
            while ($dado_pergunta = $resultado_perguntas->fetch_assoc()) {
                
                $pergunta = new Pergunta($dado_pergunta['id'], $dado_pergunta['pergunta']);
                
                echo '<div class="card mb-4">';
                echo '    <div class="card-body">';
                echo '        <p class="card-title"><strong>'.$cont.' - '.$pergunta->getPergunta().'</strong></p>';

                $resultado_respostas = $respostaDAO->buscaRespostas($conexao, $pergunta);
                
                if($resultado_respostas->num_rows > 0) {

                    while ($dado_resposta = $resultado_respostas->fetch_assoc()) {
                        
                        $resposta = new Resposta($dado_resposta['id'], $dado_resposta['id_pergunta'], $dado_resposta['resposta'], $dado_resposta['correta']);

                        echo '<div class="form-check">';
                        echo '    <input class="form-check-input" type="radio" id="'.$resposta->getId().'" name="pergunta'.$pergunta->getId().'" value="'.$resposta->getCorreta().'" required>';
                        echo '    <label class="form-check-label" for="'.$resposta->getId().'">'.$resposta->getResposta().'</label>';
                        echo '</div>';
                    }
                
                    echo '    </div>'; // fecha card-body
                    echo '</div>';
                }

                $cont++;

            }
        }
        
    }

    public function insereQuiz($dados) {

        $conexao = new Connection();
        $quizDAO = new QuizDAO();

        $resultado = 0;
        foreach($dados as $dado){
            if($dado == 1){
                $resultado++;
            }
        }

        $quizDAO->insereQuiz($conexao, $resultado);

    }

    public function defineNivel() {

        $conexao = new Connection();
        $quizDAO = new QuizDAO();
        $nivelDAO = new NivelDAO();
        $usuarioNivelDAO = new UsuarioNivelDAO();

        $resultado = $quizDAO->buscaQuiz($conexao);
        $resultado_quiz = $resultado->fetch_assoc();

        $quiz = new Quiz($resultado_quiz['id'], $resultado_quiz['id_usuario'], $resultado_quiz['resposta_correta'], $resultado_quiz['completado']);

        if($quiz->getRespostaCorreta() <= 4) {
            
            $resultado = $nivelDAO->buscaNivel($conexao, 'A1');
            $resultado_nivel = $resultado->fetch_assoc();

            $nivel = new Nivel($resultado_nivel['id'], $resultado_nivel['nivel']);

            $usuarioNivelDAO->atribuiNivel($conexao, $nivel);

        }
        elseif($quiz->getRespostaCorreta() >= 5 && $quiz->getRespostaCorreta() <= 8) {
            
            $resultado = $nivelDAO->buscaNivel($conexao, 'A2');
            $resultado_nivel = $resultado->fetch_assoc();

            $nivel = new Nivel($resultado_nivel['id'], $resultado_nivel['nivel']);

            $usuarioNivelDAO->atribuiNivel($conexao, $nivel);

        }
        elseif($quiz->getRespostaCorreta() >= 9 && $quiz->getRespostaCorreta() <= 12) {
                        
            $resultado = $nivelDAO->buscaNivel($conexao, 'B1');
            $resultado_nivel = $resultado->fetch_assoc();

            $nivel = new Nivel($resultado_nivel['id'], $resultado_nivel['nivel']);

            $usuarioNivelDAO->atribuiNivel($conexao, $nivel);

        }
        elseif($quiz->getRespostaCorreta() >= 13 && $quiz->getRespostaCorreta() <= 16) {
                        
            $resultado = $nivelDAO->buscaNivel($conexao, 'B2');
            $resultado_nivel = $resultado->fetch_assoc();

            $nivel = new Nivel($resultado_nivel['id'], $resultado_nivel['nivel']);

            $usuarioNivelDAO->atribuiNivel($conexao, $nivel);

        }
        elseif($quiz->getRespostaCorreta() >= 17 && $quiz->getRespostaCorreta() <= 20) {
                        
            $resultado = $nivelDAO->buscaNivel($conexao, 'C1');
            $resultado_nivel = $resultado->fetch_assoc();

            $nivel = new Nivel($resultado_nivel['id'], $resultado_nivel['nivel']);

            $usuarioNivelDAO->atribuiNivel($conexao, $nivel);

        }
        else{
                        
            $resultado = $nivelDAO->buscaNivel($conexao, 'C2');
            $resultado_nivel = $resultado->fetch_assoc();

            $nivel = new Nivel($resultado_nivel['id'], $resultado_nivel['nivel']);

            $usuarioNivelDAO->atribuiNivel($conexao, $nivel);

        }

    }

}