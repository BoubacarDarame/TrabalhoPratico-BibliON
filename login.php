<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$redirect = "";
if (isset($_GET['redirect_to'])) {
    $redirect = $_GET['redirect_to'];
}
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="icones/favicon.ico">
    <link rel="stylesheet" href="css/style.css">

</head>

<!--Body do formulário login-->

<body class="body-auth">

    <div class="form-glass-box">

        <button onclick="history.back()" class="btn-close-absolute" aria-label="Fechar">
            <i class="bi bi-x-lg"></i>
        </button>
        
        <h2 class="text-center text-white fw-bold mb-4">Iniciar Sessão</h2>

        <?php if (isset($_GET['erro']) && $_GET['erro'] == '1'): ?>
            <div class="alert alert-danger text-center py-2 mb-3 shadow-sm border-0">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>Email ou password incorretos.
            </div>
        <?php endif; ?>

        <form action="autenticacao/processar_login.php" method="POST">

            <?php if (!empty($redirect)): ?>
                <input type="hidden" name="redirect_to" value="../<?php echo htmlspecialchars($redirect); ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="nome@exemplo.com" required>
            </div>

            <div class="mb-4">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="••••••••" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkAdmin" name="is_admin">
                <label class="form-check-label text-white-50" for="checkAdmin">Acesso Administrativo</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 btn-lg">Entrar</button>

            <hr class="text-white-50 my-4">

            <div class="text-center">
                <p class="text-white-50 mb-2">Não tem conta?</p>
                <a href="registar.php" class="btn btn-outline-light w-75">Criar conta</a>
            </div>
        </form>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>