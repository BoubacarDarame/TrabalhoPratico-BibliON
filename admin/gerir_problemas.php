<?php
session_start();
include 'includes/connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') { header("Location: ../login.php"); exit; }

$sql = "SELECT * FROM problemas ORDER BY ID_Problema DESC";
$stmt = $dbh->query($sql);
$problemas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblion</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../icones/favicon.ico">
    <link href="css/admin_style.css" rel="stylesheet">

</head>
<body>

    <?php include 'includes/nav.php'; ?>

    <div class="main-content">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold">Problemas Comunicados</h2>
            
            <div class="row g-4">
                <?php foreach($problemas as $prob): ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-0 shadow-sm h-100">
                            
                            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                <span class="fw-bold text-muted">Problema #<?php echo $prob['ID_Problema']; ?></span>
                                
                                <button onclick="alternarEstado(this)" 
                                        class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center shadow-sm btn-estado"
                                        style="width: 40px; height: 40px;"
                                        title="Marcar como Resolvido">
                                    <i class="bi bi-x-lg fs-5"></i>
                                </button>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title fw-bold mb-3">
                                    <?php echo htmlspecialchars($prob['Assunto'] ?? 'Sem Assunto'); ?>
                                </h5>
                                
                                <p class="card-text text-muted bg-light p-3 rounded">
                                    <?php echo nl2br(htmlspecialchars($prob['Mensagem'] ?? $prob['Descricao'])); ?>
                                </p>

                                <p class="text-end small text-secondary mb-0">
                                    Enviado por: 
                                    <strong>
                                        <?php 
                                            echo htmlspecialchars($prob['Email'] ?? $prob['Email_Utilizador'] ?? 'Anónimo'); 
                                        ?>
                                    </strong>
                                </p>
                            </div>

                            <div class="card-footer bg-white border-top-0 pb-3">
                                <span class="badge bg-warning text-dark badge-estado">Pendente</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!--Animação para dar o problema como resolvido (apenas visual)-->
    <script>
        function alternarEstado(botao) {
            let icone = botao.querySelector('i');
            let card = botao.closest('.card');
            let badge = card.querySelector('.badge-estado');

            if (botao.classList.contains('btn-danger')) {
                botao.classList.remove('btn-danger');
                botao.classList.add('btn-success');
                icone.classList.remove('bi-x-lg');
                icone.classList.add('bi-check-lg');
                badge.classList.remove('bg-warning', 'text-dark');
                badge.classList.add('bg-success');
                badge.textContent = "Resolvido";
            } else {
                botao.classList.remove('btn-success');
                botao.classList.add('btn-danger');
                icone.classList.remove('bi-check-lg');
                icone.classList.add('bi-x-lg');
                badge.classList.remove('bg-success');
                badge.classList.add('bg-warning', 'text-dark');
                badge.textContent = "Pendente";
            }
        }
    </script>
</body>
</html>