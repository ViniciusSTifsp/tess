<?php
session_start();
if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
    include_once('../config/config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conexao->query($sql);

    if($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $pwd_hashed = $user['senha']; // Supondo que a coluna com a senha hash seja 'senha'

        if(password_verify($senha, $pwd_hashed))
        {
            if ($user['admin']) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['admin'] = $email;
                header('Location: ../view/sistema.php');
            } else{
                $_SESSION['id'] = $user['id'];
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['email'] = $email;
                if (!$user['login']) {
                    header('Location: ../view/quiz.php');
                }
                else{
                    header('Location: ../view/home.php');
                }
            }
        }
        else 
        {
            $_SESSION['error'] = 'Senha incorreta!';
            header('Location: ../view/login.php');
        }
    }
    else
    {
        $_SESSION['error'] = 'Usuário não encontrado!';
        header('Location: ../view/login.php');
    }
}
else
{
    header('Location: ../view/login.php');
}
?>
