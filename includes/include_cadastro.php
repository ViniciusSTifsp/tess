<?php
if (isset($_POST['submit'])) {
    include_once('../config/config.php');

    // Obtenha os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("SELECT email FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo "<script>alert('esse email já está cadastrado')</script>";
    } else {
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("sss", $nome, $email, $senha_cripto);
        if ($stmt->execute()) {
            // Redirecione se a inserção foi bem-sucedida
            header('Location: ../view/login.php');
            exit(); // Certifique-se de que o script PHP pare de executar após o redirecionamento
        } else {
            // Trate o erro de inserção
            echo "Erro: " . $stmt->error;
        }
    }

    // Prepare a consulta SQL para evitar injeção de SQL
    

    // Feche a declaração
    $stmt->close();

    // Feche a conexão
    $conexao->close();
}
?>