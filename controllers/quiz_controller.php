<?php
    include_once('../config/config.php');

    $cont = 1;
    for($i = 19; $i <= 43; $i++){
        $pergunta= "SELECT * FROM perguntas WHERE id = $i";
        $result = $conexao->query($pergunta);

        if($result && $result->num_rows > 0) {
            
            $pergunta = $result->fetch_assoc();
            echo "<p>".$cont." - ".$pergunta['pergunta']."</p></br>";
            
            $resposta = "SELECT * FROM respostas WHERE id_pergunta = $i";
            $result = $conexao->query($resposta);
            
            if($result && $result->num_rows > 0) {
                
                while ($respostas = $result->fetch_assoc()) {
                    echo '<input type="radio" id="'.$respostas['id'].'" name="pergunta'.$i.'" value="'.$respostas['correta'].'" required>'.
                         '<label for="html">'.$respostas['resposta'].'</label><br>';
                }
                echo "</br>";

            }
        }
        $cont++;
    }



?>