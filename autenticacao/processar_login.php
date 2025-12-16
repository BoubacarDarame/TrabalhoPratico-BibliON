<?php

session_start();

include '../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {  

        // Preparar a consulta
        $stmt = $dbh->prepare("SELECT ID_Utilizador, Nome, Password, Cargo FROM utilizadores WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Verificar se encontrou o utilizador
        if ($stmt->rowCount() > 0) {

            $user = $stmt->fetch();

            // Verificar a Password
            if (password_verify($password, $user['Password'])) {
                
                $_SESSION['user_id'] = $user['ID_Utilizador'];
                $_SESSION['user_name'] = $user['Nome'];
                $_SESSION['user_role'] = $user['Cargo'];

                $quer_entrar_como_admin = isset($_POST['is_admin']);

                if ($user['Cargo'] === 'admin' && $quer_entrar_como_admin) {
                    header("Location: ../admin/dashboard.php"); // Vai para a pasta admin
                    exit;
                } else {
                    // Se for utilizador normal
                    if (isset($_POST['redirect_to']) && !empty($_POST['redirect_to'])) {
                        header("Location: " . $_POST['redirect_to']);
                    } else {
                        header("Location: ../index.php");
                    }
                }
                exit;

            } else {
                header("Location: ../login.php?erro=1"); 
                exit;
            }
        } else {
            header("Location: ../login.php?erro=1"); 
                exit;
        }

    } catch (PDOException $e) {
        echo "Erro de sistema: " . $e->getMessage();
    }
}

?>