<?php
session_start();

include 'includes/connection.php'; 

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
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
            <h2 class="fw-bold text-dark mb-4">Visão Geral</h2>
            
            <div class="row g-4 mb-5">
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted text-uppercase mb-2">Total Livros</h6>
                                <h3 class="fw-bold text-primary mb-0">
                                    <?php 
                                        $stmt = $dbh->query("SELECT COUNT(*) FROM livros");
                                        echo $stmt->fetchColumn(); 
                                    ?>
                                </h3>
                            </div>
                            <div class="icon-box bg-primary bg-opacity-10 text-primary p-3 rounded">
                                <i class="bi bi-book fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted text-uppercase mb-2">Utilizadores</h6>
                                <h3 class="fw-bold text-success mb-0">
                                    <?php 
                                        $stmt = $dbh->query("SELECT COUNT(*) FROM utilizadores WHERE Cargo = 'user'");
                                        echo $stmt->fetchColumn(); 
                                    ?>
                                </h3>
                            </div>
                            <div class="icon-box bg-success bg-opacity-10 text-success p-3 rounded">
                                <i class="bi bi-people fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted text-uppercase mb-2">Problemas Reportados</h6>
                                <h3 class="fw-bold text-danger mb-0">
                                    <?php 
                                        $stmt = $dbh->query("SELECT COUNT(*) FROM problemas");
                                        echo $stmt->fetchColumn(); 
                                    ?>
                                </h3>
                            </div>
                            <div class="icon-box bg-danger bg-opacity-10 text-danger p-3 rounded">
                                <i class="bi bi-exclamation-triangle fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>