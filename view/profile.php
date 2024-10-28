<?php
    include "../includes/include_home.php"
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
    <!-- Seção de Dados Pessoais -->
    <div class="profile-section mt-5">
        <div class="profile-header">
            <h2>Minha Conta</h2>
        </div>
        <hr>
        <h5>Dados Pessoais</h5>
        <form id="dadosPessoaisForm">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sobrenome" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="sobrenome" placeholder="Digite seu sobrenome">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" placeholder="(XX) XXXXX-XXXX">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Salvar alterações</button>
        </form>
    </div>

    <!-- Seção de Alteração de Senha -->
    <div class="profile-section mt-4">
        <h5>Alterar Senha</h5>
        <form id="senhaForm">
            <div class="mb-3">
                <label for="senhaAtual" class="form-label">Senha Atual</label>
                <input type="password" class="form-control" id="senhaAtual" placeholder="Digite sua senha atual">
            </div>
            <div class="mb-3">
                <label for="novaSenha" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="novaSenha" placeholder="Digite uma nova senha">
            </div>
            <div class="mb-3">
                <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmarSenha" placeholder="Confirme a nova senha">
            </div>
            <button type="submit" class="btn btn-primary">Alterar Senha</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../src/js/script2.js"></script>
</body>

</html>