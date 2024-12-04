<?php

if ($_REQUEST['id']) {
    require_once('../controllers/AdminController.php');
    $admin = new AdminController();
    $conteudo = $admin->carregaConteudo($_REQUEST['id']);
} else {
    header('Location: ../view/admin.php');
}

include "../includes/include_sistema.php";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/style/style3.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" HREF="../src/images//luneta_transparente.ico">
    <title>Editar conteúdo</title>
</head>

<body>

    <?php include_once "../module/menu_admin.php" ?>

    <div>
        <?php echo '<strong>' . (isset($_REQUEST['msg']) ? $_REQUEST['msg'] : "") . '</strong>'; ?>
    </div>
    
    <h1 id="titulo_semana"><span class="theme_title">Alteração</span> de Conteúdos</h1>

    <div class="profile-section mt-5">

        <div class="row">

            <div class="form_editar">
                <form action="../config/edit_conteudo_handler.php" method="POST">
                    <input type="hidden" name="id" value="<?= $conteudo->getId() ? $conteudo->getId() : '' ?>" />
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="<?= $conteudo->getTitulo() ? $conteudo->getTitulo() : 'Título' ?>" value="<?= $conteudo->getTitulo() ? $conteudo->getTitulo() : '' ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" placeholder="">
                        <?= $conteudo->getDescricao() ? $conteudo->getDescricao() : 'Descrição' ?>
                    </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Salvar alterações</button>
                </form>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Arquivo JS personalizado -->
    <script src="../src/js/script2.js"></script>

    </div>
    </div>
    </div>
    </div>
    </div>
</body>