<?php
    include "../includes/include_home.php";
    require_once('../controllers/UsuarioController.php');
    require_once('../class/Usuario.php');

    $usuarioController = new UsuarioController();
    $usuario = $usuarioController->info();

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
    <title>Perfil</title>
</head>

<body>
    <?php require_once('../config/is_admin.php'); ?>
    <!-- Seção de Dados Pessoais -->
    <div class="profile-section mt-5">
        <div class="profile-header">
            <h2>Minha Conta</h2>
        </div>
        <hr>
        <h5>Dados Pessoais</h5>
        <form action="../config/info_handler.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input 
                        type="text"
                        class="form-control"
                        id="nome"
                        name="nome"
                        placeholder="<?= $usuario->getNome() ? $usuario->getNome() : 'Nome' ?>"
                        value="<?= $usuario->getNome() ? $usuario->getNome() : '' ?>"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input 
                        type="sobrenome" 
                        class="form-control" 
                        id="sobrenome" 
                        name="sobrenome" 
                        placeholder="<?= $usuario->getSobrenome() ? $usuario->getSobrenome() : 'Sobrenome' ?>" 
                        value="<?= $usuario->getSobrenome() ? $usuario->getSobrenome() : '' ?>"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input 
                        type="tel" 
                        class="form-control" 
                        id="telefone" 
                        name="telefone" 
                        placeholder="<?= $usuario->getTelefone() ? $usuario->getTelefone() : 'Telefone'  ?>" 
                        value="<?= $usuario->getTelefone() ? $usuario->getTelefone() : '' ?>"
                        pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        placeholder="<?= $usuario->getEmail() ? $usuario->getEmail() : 'E-mail' ?>" 
                        value="<?= $usuario->getEmail() ? $usuario->getEmail() : '' ?>"
                    />
                </div>
            </div>

            <button type="submit" class="btn btn-success" name="submit">Salvar alterações</button>
        </form>
    </div>

    <!-- Seção de Alteração de Senha -->
    <div class="profile-section mt-4">
        <h5>Alterar Senha</h5>
        <?php echo '<p><strong>'.((isset($_REQUEST['msg']) ? $_REQUEST['msg'] : "") ).'</strong></p>' ?>
        <form id="senhaForm" action="../config/senha_handler.php" method="POST">
            <div class="mb-3">
                <label for="senhaAtual" class="form-label">Senha Atual</label>
                <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" placeholder="Digite sua senha atual">
            </div>
            <div class="mb-3">
                <label for="novaSenha" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="novaSenha" name="senha" placeholder="Digite uma nova senha">
            </div>
            <div class="mb-3">
                <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" placeholder="Confirme a nova senha">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Alterar Senha</button>
        </form>
    </div>
    </div>
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
</body>

</html>