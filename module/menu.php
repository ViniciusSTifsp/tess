<?php
    require_once('../controllers/UsuarioNivelController.php');
    $usuarioNivelController = new UsuarioNivelController();
    $nivel = $usuarioNivelController->buscaUsuarioNivel();
?>

<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="../view/index.php">TESS</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="../view/home.php" class="sidebar-link">
                    <i class="lni lni-agenda"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../view/home.php?semana=1" class="sidebar-link">
                <i class="lni lni-pencil"></i>
                    <span>Semana 1</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../view/home.php?semana=2" class="sidebar-link">
                <i class="lni lni-pencil"></i>
                    <span>Semana 2</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../view/home.php?semana=3" class="sidebar-link">
                <i class="lni lni-pencil"></i>
                    <span>Semana 3</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../view/home.php?semana=4" class="sidebar-link">
                <i class="lni lni-pencil"></i>
                    <span>Semana 4</span>
                </a>
            </li>
        </ul>
        <li class="sidebar-item">
            <a href="../view/profile.php" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span><?= $_SESSION['nome'] ?> (Nível <?= $nivel->getNivel() ?>)</span>
            </a>
        </li>
        <div class="sidebar-footer">
            <a href="../config/sair.php" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <div class="main p-3">
        <div class="container-fluid">
            <div class="row">
                <!-- Menu Lateral -->
                <!-- Área do Perfil -->
                <div class="col-md-9">