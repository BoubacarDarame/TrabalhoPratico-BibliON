<?php

include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receber os dados
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validação simples de passwords
    if ($password !== $confirm_password) {
        echo "<script>alert('As passwords não coincidem!'); window.history.back();</script>";
        exit;
    }

    try {

        // Verificar se o email já existe
        $stmt = $dbh->prepare("SELECT ID_Utilizador FROM utilizadores WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Este email já está registado!'); window.history.back();</script>";
            exit;
        }

        // Encriptar a password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Inserir novo utilizador
        $sql = "INSERT INTO utilizadores (Nome, Email, Password, DataRegisto) VALUES (:nome, :email, :pass, NOW())";
        
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $password_hash);

        if ($stmt->execute()) {
            echo "<script>alert('Conta criada com sucesso! Faça login.'); window.location.href='../login.php';</script>";
        } else {
            echo "<script>alert('Erro ao criar conta.'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "Erro de Base de Dados: " . $e->getMessage();
    }
}

?>