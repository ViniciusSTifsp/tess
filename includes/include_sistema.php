<?php
    session_start();
    include_once('../config/config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['admin']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['admin']);
        unset($_SESSION['senha']);
        header('Location: ../view/login.php');
    }
    $logado = $_SESSION['admin'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>