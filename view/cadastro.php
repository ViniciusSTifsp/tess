<?php
    if(isset($_SESSION['admin'])) {
        header('Location: ../view/admin.php');
    }
    elseif(isset($_SESSION['email'])) {
        header('Location: ../view/home.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../src/style/style2.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" HREF="../src/images//luneta_transparente.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #2E8098;">
                <div class="featured-image mb-3">
                    <img src="../src/images/mapa_transparente.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">TESS</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Realize seu cadastro e inicie seus estudos!</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center ">
                    <form action="../config/cadastro_handler.php" method="POST">
                        <div class="header-text mb-4">
                            <h2>Welcome</h2>
                            <p>Estamos felizes em te ver!.</p>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control form-control-lg bg-light fs-6 inputUser" name="nome" placeholder="Nome" id="nome" required>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control form-control-lg bg-light fs-6 inputUser" name="sobrenome" placeholder="Sobrenome" id="sobrenome" required>
                        </div>
                        <div class="input-group mb-1">
                            <input type="tel" class="form-control form-control-lg bg-light fs-6 inputUser" name="telefone" placeholder="Telefone" id="telefone" required>
                        </div>
                        <div class="input-group mb-1">
                            <input type="email" class="form-control form-control-lg bg-light fs-6 inputUser" name="email" placeholder="Email" id="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6 inputUser" name="senha" placeholder="Senha" id="senha" required>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6 inputSubmit" style="background:#2E8098; border-color:#2E8098" type="submit" name="submit" value="Enviar">Cadastre-se</button>
                        </div>
                        <div>
                            <?php echo '<strong>' . (isset($_REQUEST['msg']) ? $_REQUEST['msg'] : "") . '</strong>'; ?>
                        </div>
                        <div class="row">
                            <small>Já tem uma conta? <a href="../view/login.php">Login</a></small>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</body>

</html>