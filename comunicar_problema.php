<?php
session_start();
include 'includes/connection.php';

$email_value = "";
$is_readonly = "";
$css_readonly = "";

if (isset($_SESSION['user_id'])) {
    try {
        $stmt = $dbh->prepare("SELECT Email FROM utilizadores WHERE ID_Utilizador = :id");
        $stmt->bindParam(':id', $_SESSION['user_id']);
        $stmt->execute();
        $user = $stmt->fetch();
        
        if ($user) {
            $email_value = $user['Email']; 

            $is_readonly = "readonly"; 
            
            $css_readonly = 'style="background-color: rgba(255, 255, 255, 0.1); cursor: not-allowed;"';
        }
    } catch (PDOException $e) {
        echo("Erro: " + $e);
    }
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

<!--Body da página comunicar um problema-->

<body class="body-auth">

    <div class="form-glass-box">

        <button onclick="history.back()" class="btn-close-absolute" aria-label="Fechar">
            <i class="bi bi-x-lg"></i>
        </button>
        
        <h2 class="text-center text-white fw-bold mb-3">Comunicar Problema</h2>

        <form action="processos/processar_problema.php" method="POST">

            <div class="mb-3">
                <label for="reportEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="reportEmail" name="email"
                        value="<?php echo htmlspecialchars($email_value); ?>" 
                        <?php echo $is_readonly; ?>
                        <?php echo $css_readonly; ?>
                        required placeholder="O seu email">
            </div>

            <div class="mb-3">
                <label for="reportSubject" class="form-label">Assunto</label>
                <input type="text" class="form-control" id="reportSubject" name="assunto" placeholder="Breve resumo do problema" required>
            </div>
            
            <div class="mb-3">
                <label for="reportDescription" class="form-label">Descrição Detalhada do Problema</label>
                <textarea class="form-control" id="reportDescription" name="descricao" rows="5" placeholder="Descreva o que aconteceu e os passos para reproduzir o problema." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg">Enviar Problema</button>

            <hr class="text-white-50 my-3">

            <div class="text-center">
                <p class="text-white-50 mb-1">Ainda não tem a certeza?</p>
                <a href="faqs.php" class="btn btn-outline-light w-75">Ver FAQ's</a>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>