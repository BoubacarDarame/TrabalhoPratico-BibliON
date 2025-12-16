<?php
session_start();
include 'includes/connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT * FROM utilizadores ORDER BY ID_Utilizador DESC";
$stmt = $dbh->query($sql);
$users = $stmt->fetchAll();
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

    <?php include 'includes/nav.php';?>

    <div class="main-content">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold">Gestão de Utilizadores</h2>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Cargo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                <tr>
                                    <td>#<?php echo $user['ID_Utilizador']; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-secondary text-white d-flex justify-content-center align-items-center me-2" style="width: 35px; height: 35px;">
                                                <?php echo strtoupper(substr($user['Nome'], 0, 1)); ?>
                                            </div>
                                            <?php echo htmlspecialchars($user['Nome']); ?>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars($user['Email']); ?></td>
                                    <td>
                                        <?php if($user['Cargo'] == 'admin'): ?>
                                            <span class="badge bg-primary">Admin</span>
                                        <?php else: ?>
                                            <span class="badge bg-light text-dark border">User</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>