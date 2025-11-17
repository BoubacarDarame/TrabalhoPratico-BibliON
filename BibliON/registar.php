<!DOCTYPE html>
<html lang="pt-pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="imgs/icones/favicon.ico">
    <link rel="stylesheet" href="css/style.css">

</head>

<!--Body do formulário registar-->

<body class="body-auth">

    <a href="index.php" class="btn-back">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

    <div class="form-glass-box">
        
        <h2 class="text-center text-white fw-bold mb-2">Criar Conta</h2>

        <form action="processar_registo.php" method="POST">
            
            <div class="mb-3">
                <label for="regNome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="regNome" name="nome" placeholder="O seu nome" required>
            </div>

            <div class="mb-3">
                <label for="regEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="regEmail" name="email" placeholder="O seu email" required>
            </div>

            <div class="mb-3">
                <label for="regPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="regPassword" name="password" placeholder="Crie uma password" required>
            </div>
            
            <div class="mb-3">
                <label for="regConfirmPassword" class="form-label">Confirmar Password</label>
                <input type="password" class="form-control" id="regConfirmPassword" name="confirm_password" placeholder="Repita a password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg">Criar Conta</button>

            <hr class="text-white-50 my-3">

            <div class="text-center">
                <p class="text-white-50 mb-2">Já tem conta?</p>
                <a href="login.php" class="btn btn-outline-light w-75">Iniciar Sessão</a>
            </div>
        </form>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>