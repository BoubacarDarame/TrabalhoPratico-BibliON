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

<!--Body do formulário login-->

<body class="body-auth">

    <a href="index.php" class="btn-back">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

    <div class="form-glass-box">
        
        <h2 class="text-center text-white fw-bold mb-4">Iniciar Sessão</h2>

        <form action="processar_login.php" method="POST">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="O seu email" required>
            </div>

            <div class="mb-4">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="••••••••" required>
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