<?php

session_start();

include '../includes/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_user = $_SESSION['user_id'];
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($new_pass !== $confirm_pass) {
        echo "<script>alert('A nova password e a confirmação da nova password não coincidem.'); window.history.back();</script>";
        exit;
    }

    try {

        $stmt = $dbh->prepare("SELECT Password FROM utilizadores WHERE ID_Utilizador = :id");
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        $user = $stmt->fetch();

        if (password_verify($current_pass, $user['Password'])) {
            
            $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);

            $update = $dbh->prepare("UPDATE utilizadores SET Password = :pass WHERE ID_Utilizador = :id");
            $update->bindParam(':pass', $new_hash);
            $update->bindParam(':id', $id_user);

            if ($update->execute()) {
                echo "<script>alert('Password atualizada com sucesso!'); window.location.href='../perfil.php';</script>";
            } else {
                echo "<script>alert('Erro ao atualizar.'); window.history.back();</script>";
            }

        } else {
            echo "<script>alert('A password atual está incorreta.'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "Erro de sistema: " . $e->getMessage();
    }
} else {
    header("Location: ../perfil.php");
}
?>