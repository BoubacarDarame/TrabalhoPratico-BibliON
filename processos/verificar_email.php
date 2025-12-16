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
            header("Location: ../recuperar_password.php?erro=1"); 
                exit;
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>