<?php 
    include "../includes/include_home.php";
    require_once('../controllers/ConteudoController.php');
    $conteudoController = new ConteudoController();
    $semana = (isset($_REQUEST['semana']) ? $_REQUEST['semana'] : 1);
    if (isset($_POST['dia'])) {
        $conteudo = $conteudoController->conteudoModal($semana, $_POST['dia']);
    }
    else {
        $conteudo = $conteudoController->conteudoModal($semana, 1);
    }
    
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
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGuiaLabel"><?= $conteudo->getTitulo() ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalTexto">Conteúdo do guia aqui...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Arquivo JS personalizado -->
    <script src="../src/js/script2.js"></script>
    <script>
        function abrirModal(dia) {
            // Atualizar o conteúdo do modal com o dia selecionado
            postAjax(dia);
            var textoGuia = "<?php echo $conteudo->getDescricao() ?>";
            document.getElementById("modalTexto").innerText = textoGuia;
 
            // Abrir o modal
            var modal = new bootstrap.Modal(document.getElementById('modalGuia'));
            modal.show();
        }

        function postAjax(dia) {
            $.ajax({
                action: '../view/home.php',
                type: 'POST',
                data: {dia:dia},
                success:function(data){
                   alert("got response as "+"'"+dia+"'");
                }
            });
        }
    </script>
</body>
 
</html>