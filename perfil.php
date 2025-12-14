<?php
session_start();
include 'includes/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$dados_utilizador = null;

try {
    $stmt = $dbh->prepare("SELECT Nome, Email, DataRegisto FROM utilizadores WHERE ID_Utilizador = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $dados_utilizador = $stmt->fetch();

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="icones/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body class="body-auth"> 

    <!--Navbar-->

    <?php 
        include("includes/nav.php")
    ?>

    <!--Página de perfil do utilizador-->

    <div class="container" style="padding-top: 8rem; padding-bottom: 4rem;">
        
        <div class="row justify-content-center">
            
            <div class="col-lg-4 mb-4">

                <div class="profile-header text-center text-white">

                    <div class="profile-avatar-large">
                        <?php echo strtoupper(substr($dados_utilizador['Nome'], 0, 1)); ?>
                    </div>
                    
                    <h3 class="fw-bold"><?php echo htmlspecialchars($dados_utilizador['Nome']); ?></h3>
                    <p class="text-white-50 mb-4"><?php echo htmlspecialchars($dados_utilizador['Email']); ?></p>
                    
                    <hr class="border-white opacity-50">
                    
                    <div class="text-start mt-4">

                        <p class="small text-white-75 mb-1">Membro desde:</p>
                        <p class="fw-bold"><?php echo date('d/m/Y', strtotime($dados_utilizador['DataRegisto'])); ?></p>

                    </div>

                    <a href="autenticacao/logout.php" class="btn btn-danger py-2 w-100 mt-4">
                        <i class="bi bi-box-arrow-right me-2"></i>Terminar Sessão
                    </a>
                </div>
            </div>

            <div class="col-lg-7">

                <div class="profile-header text-white">

                    <h4 class="fw-bold mb-4 border-bottom border-secondary pb-3">
                        <i class="bi bi-shield-lock me-2"></i>Segurança
                    </h4>

                    <form action="processos/alterar_password.php" method="POST">
                        
                        <div class="mb-4">
                            <label class="form-label">Password Atual</label>
                            <input type="password" name="current_password" class="form-control bg-dark text-white border-secondary" required placeholder="Para confirmar que é você">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nova Password</label>
                                <input type="password" name="new_password" class="form-control bg-dark text-white border-secondary" required placeholder="A sua nova password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirmar Nova Password</label>
                                <input type="password" name="confirm_password" class="form-control bg-dark text-white border-secondary" required placeholder="Repita a sua nova password">
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-profile px-4">
                                Atualizar Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>