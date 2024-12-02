<?php

if ($_REQUEST['id']) {
    require_once('../controllers/AdminController.php');
    $admin = new AdminController();
    $usuario = $admin->carregaUsuario($_REQUEST['id']);
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
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" HREF="../src/images//luneta_transparente.ico">
    <title>TESS</title>
</head>

<body>

    <?php include_once "../module/menu_admin.php" ?>

    <div>
        <?php echo '<strong>' . (isset($_REQUEST['msg']) ? $_REQUEST['msg'] : "") . '</strong>'; ?>
    </div>

    <form action="../config/edit_usuario_handler.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario->getId() ? $usuario->getId() : '' ?>" />
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="<?= $usuario->getNome() ? $usuario->getNome() : 'Nome' ?>" value="<?= $usuario->getNome() ? $usuario->getNome() : '' ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="sobrenome" class="form-control" id="sobrenome" name="sobrenome" placeholder="<?= $usuario->getSobrenome() ? $usuario->getSobrenome() : 'Sobrenome' ?>" value="<?= $usuario->getSobrenome() ? $usuario->getSobrenome() : '' ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="<?= $usuario->getTelefone() ? $usuario->getTelefone() : 'Telefone'  ?>" value="<?= $usuario->getTelefone() ? $usuario->getTelefone() : '' ?>" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="<?= $usuario->getEmail() ? $usuario->getEmail() : 'E-mail' ?>" value="<?= $usuario->getEmail() ? $usuario->getEmail() : '' ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="admin1" class="form-label">Sim</label>
                <input type="radio" class="form-check-input" id="admin" name="admin" value="1" <?= $usuario->getAdmin() ? 'checked' : '' ?> />
                <label for="admin2" class="form-label">Não</label>
                <input type="radio" class="form-check-input" id="admin" name="admin" value="0" <?= $usuario->getAdmin() ? '' : 'checked' ?> />
            </div>
        </div>

        <button type="submit" class="btn btn-success" name="submit">Salvar alterações</button>
    </form>
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