<?php 
    include "../includes/include_home.php";
    require_once('../controllers/ConteudoController.php');
    $conteudoController = new ConteudoController();
    $semana = (isset($_REQUEST['semana']) ? $_REQUEST['semana'] : 1);
    require_once('../controllers/SpotifyController.php');
    $spotifyController = new SpotifyController();
?>
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/style/style3.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" HREF="../src/images//luneta_transparente.ico">
    <title>TESS</title>
</head>
 
<body>
    <?php include_once "../module/menu.php" ?>
 
    <h1 id="titulo_semana"><span class="theme_title">Week <?= $semana ?> </span></h1>
 
    <h1 id="titulo_semana">Your <span class="theme_title">Days</span></h1>
    
    <?= $conteudoController->geraCardsConteudo($semana) ?>
 
    <!-- Modal -->
    <div class="modal fade" id="modalGuia" tabindex="-1" aria-labelledby="modalGuiaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <p class="alert-success" id="resultado"></p>
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalTexto"></p>
                    <p id="modalMusica">Para alavancar o seu aprendizado, segue uma recomendação de música!</p>
                    <?php $spotifyController->selecionaMusica();?> <br>
                    <p id="modalMusica">Atualize a página para uma nova recomendação!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success concluido" id="concluido" value="">Concluído</button>
                </div>
            </div>
        </div>
    </div>

    <img src="../src/images/masco_colorido2_adobe_express.png" class="imgTessie" alt="">
 
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Arquivo JS personalizado -->
    <script src="../src/js/script2.js"></script>

    <script>
        $('.conteudo').click(function(){

            var dia = $(this).data('id');

            var url_string = window.location.href;
            var url = new URL(url_string);
            var semana = url.searchParams.get("semana");

            $.ajax({

                url: '../config/conteudo_handler.php',
                data: {
                          'dia': dia,
                          'semana': semana ? semana : 1
                      },
                type: 'POST',

                success: function(result) {
                    //console.log(result);
                    const json = JSON.parse(result);

                    var modalId = json.id;
                    var modalTitulo = json.titulo;
                    var modalTexto = json.descricao;
                    var concluido = json.concluido;

                    document.getElementById("modalTitulo").innerText = modalTitulo;
                    document.getElementById("modalTexto").innerText = modalTexto;
                    document.getElementById("concluido").value = modalId;

                    if(concluido == '1'){
                        document.getElementById("concluido").setAttribute("disabled", "true");
                    }
                    else {
                        document.getElementById("concluido").removeAttribute("disabled")
                    }

                    var modal = new bootstrap.Modal(document.getElementById('modalGuia'));
                    modal.show();
                }

            })

        });

        $('.concluido').click(function(){
            
            var id = document.getElementById('concluido').value;
            
            $.ajax({
                url: '../config/concluido_handler.php',
                data: {
                        'id': id
                    },
                type: 'POST',

                success: function(result) {
                    document.getElementById("modalTitulo").innerText = result;
                    document.getElementById("concluido").setAttribute("disabled", "true");
                }
            })
        });

    </script>
</body>
 
</html>
