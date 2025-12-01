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

<!--Body da página recuperar password-->

<body class="body-auth">

    <a href="index.php" class="btn-back">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

    <div class="form-glass-box">
        
        <h2 class="text-center text-white fw-bold mb-4">Recuperar Password</h2>
        <p class="text-center text-white-50 mb-4">
            Insira o email associado à sua conta. Iremos enviar um link para redefinir a sua password.
        </p>

        <form action="processar_recuperacao.php" method="POST">
            
            <div class="mb-4">
                <label for="recoveryEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="recoveryEmail" name="email" placeholder="introduzaoseu@email.com" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 btn-lg">
                Enviar Link de Recuperação
            </button>

            <hr class="text-white-50 my-4">

            <div class="text-center">
                <a href="faqs.php" class="btn btn-outline-light w-75">Preciso de Ajuda (FAQ's)</a>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>