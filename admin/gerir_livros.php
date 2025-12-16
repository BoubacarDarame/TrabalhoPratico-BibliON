<?php
session_start();
include 'includes/connection.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') { header("Location: ../login.php"); exit; }

$sql = "SELECT livros.*, editoras.NomeEditora, autores.NomeAutor FROM livros 
        LEFT JOIN editoras ON livros.ID_Editora = editoras.ID_Editora
        LEFT JOIN autores ON livros.ID_Autor = autores.ID_Autor
        ORDER BY ID_Livro DESC";
$stmt = $dbh->query($sql);
$livros = $stmt->fetchAll();
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0">Gestão de Livros</h2>
                <a href="formulario_livro.php" class="btn btn-primary" style="background-color: #008080; border: none;">
                    <i class="bi bi-plus-lg me-2"></i>Novo Livro
                </a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 80px;">Capa</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Editora</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($livros as $livro): ?>
                            <tr>
                                <td>
                                    <?php 
                                    $caminho_img = "../" . $livro['Imagem'];
                                    ?>

                                    <?php if (!empty($livro['Imagem']) && file_exists($caminho_img)): ?>
                                        <img src="<?php echo htmlspecialchars($caminho_img); ?>" 
                                            class="rounded shadow-sm" style="width: 50px; height: 70px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted border" 
                                            style="width: 50px; height: 70px;">
                                            <i class="bi bi-book"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="fw-bold text-dark"><?php echo htmlspecialchars($livro['Titulo']); ?></td>
                                <td class="text-muted"><?php echo htmlspecialchars($livro['NomeAutor']); ?></td>
                                <td class="text-muted"><?php echo htmlspecialchars($livro['NomeEditora']); ?></td>
                                <td class="text-center">
                                    <a href="formulario_livro.php?id=<?php echo $livro['ID_Livro']; ?>" class="btn btn-sm btn-outline-teal">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>