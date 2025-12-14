<?php

session_start();
include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);

    try {

        $stmt = $dbh->prepare("SELECT ID_Utilizador FROM utilizadores WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

            $_SESSION['reset_email'] = $email;
            
            header("Location: ../index.php");
            exit;

        } else {
            echo "<script>alert('Esse email não está registado no nosso sistema.'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>