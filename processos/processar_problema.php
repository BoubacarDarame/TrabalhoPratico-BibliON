<?php
session_start();
include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $assunto = trim($_POST['assunto']);
    $descricao = trim($_POST['descricao']);
    
    $id_utilizador = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

    try {
        $sql = "INSERT INTO problemas (ID_Utilizador, Email, Assunto, Descricao) 
                VALUES (:id_user, :email, :assunto, :descricao)";
        
        $stmt = $dbh->prepare($sql);
        
        $stmt->bindParam(':id_user', $id_utilizador);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':assunto', $assunto);
        $stmt->bindParam(':descricao', $descricao);

        if ($stmt->execute()) {
            echo "<script>
                alert('Obrigado! O seu problema foi registado e será analisado.');
                window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Erro ao enviar o formulário.'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "Erro de sistema: " . $e->getMessage();
    }
} else {
    header("Location: ../comunicar_problema.php");
    exit;
}
?>