<?php
    
    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['admin']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['admin']);
        unset($_SESSION['senha']);
        header('Location: ../view/login.php');
    }

?>