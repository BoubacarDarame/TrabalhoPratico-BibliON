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
        header("Location: ../registar.php?erro=match");
        exit;
    }

    try {

        // Verificar se o email já existe
        $stmt = $dbh->prepare("SELECT ID_Utilizador FROM utilizadores WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: ../registar.php?erro=exists");
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
            header("Location: ../login.php?msg=registado");
            exit;
        } else {
            header("Location: ../registar.php?erro=generic");
            exit;
        }

    } catch (PDOException $e) {
        echo "Erro de Base de Dados: " . $e->getMessage();
    }
}

?>