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
        header("Location: ../perfil.php?erro=match");
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
                header("Location: ../perfil.php?msg=success");
                exit;
            } else {
                header("Location: ../perfil.php?erro=generic");
                exit;
            }

        } else {
            header("Location: ../perfil.php?erro=wrong");
            exit;
        }

    } catch (PDOException $e) {
        echo "Erro de sistema: " . $e->getMessage();
    }
} else {
    header("Location: ../perfil.php");
}
?>