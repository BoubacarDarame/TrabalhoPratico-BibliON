<?php

session_start();

include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {

        // Preparar a consulta
        $stmt = $dbh->prepare("SELECT ID_Utilizador, Nome, Password FROM utilizadores WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Verificar se encontrou o utilizador
        if ($stmt->rowCount() > 0) {

            $user = $stmt->fetch();

            // Verificar a Password
            if (password_verify($password, $user['Password'])) {
                
                $_SESSION['user_id'] = $user['ID_Utilizador'];
                $_SESSION['user_name'] = $user['Nome'];

                header("Location: ../index.php");
                exit;

            } else {
                echo "<script>alert('Password incorreta!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Email não encontrado!'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "Erro de sistema: " . $e->getMessage();
    }
}

?>