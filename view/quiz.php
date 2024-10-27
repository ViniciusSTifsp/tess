<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TESS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style4.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" HREF="../images//luneta_transparente.ico">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="exercise-box">
                    <h4>Bem-vindo ao nosso Teste de Nível de Língua Estrangeira!</h4>
                    <p>Este teste foi elaborado para avaliar suas habilidades em compreensão.
                        Ao final, você receberá o seu nível de proficiência, desde iniciante até avançado.
                        O teste consiste em perguntas de múltipla escolha.</p>
                        
                    <p style="font-weight: bold";>Estamos ansiosos para acompanhar seu progresso e ajudá-lo a atingir seus objetivos linguísticos!</p>
                        
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="exercise-box">

                    <form action="../config/quiz_handler.php" method="POST">
                        <?php
                        include_once('../config/config.php');

                        $cont = 1;
                        for ($i = 19; $i <= 43; $i++) {
                            $pergunta = "SELECT * FROM perguntas WHERE id = $i";
                            $result = $conexao->query($pergunta);

                            if ($result && $result->num_rows > 0) {

                                $pergunta = $result->fetch_assoc();

                                // Card para cada pergunta
                                echo '<div class="card mb-4">';
                                echo '<div class="card-body">';
                                echo "<p class='card-title'><strong>" . $cont . " - " . $pergunta['pergunta'] . "</strong></p>";

                                $resposta = "SELECT * FROM respostas WHERE id_pergunta = $i";
                                $result = $conexao->query($resposta);

                                if ($result && $result->num_rows > 0) {

                                    while ($respostas = $result->fetch_assoc()) {
                                        echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="radio" id="' . $respostas['id'] . '" name="pergunta' . $i . '" value="' . $respostas['correta'] . '" required>';
                                        echo '<label class="form-check-label" for="' . $respostas['id'] . '">' . $respostas['resposta'] . '</label>';
                                        echo '</div>';
                                    }
                                }

                                echo '</div>'; // fecha card-body
                                echo '</div>'; // fecha card

                            }
                            $cont++;
                        }
                        ?>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script3.js"></script>

</html>