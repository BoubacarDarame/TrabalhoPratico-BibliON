<?php
session_start();
include 'includes/connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../produtos.php");
    exit;
}

$id_livro = $_GET['id'];
$livro = null;

try {
    $sql = "SELECT 
                livros.*, 
                editoras.NomeEditora,
                GROUP_CONCAT(autores.NomeAutor SEPARATOR ', ') as NomeAutor
            FROM livros
            INNER JOIN editoras ON livros.ID_Editora = editoras.ID_Editora
            INNER JOIN livro_autor ON livros.ID_Livro = livro_autor.ID_Livro
            INNER JOIN autores ON livro_autor.ID_Autor = autores.ID_Autor
            WHERE livros.ID_Livro = :id
            GROUP BY livros.ID_Livro";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id_livro);
    $stmt->execute();
    
    $livro = $stmt->fetch();

    if (!$livro) {
        header("Location: ../produtos.php");
        exit;
    }

} catch (PDOException $e) {
    die("Erro ao carregar livro: " . $e->getMessage());
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

    <style>
        .custom-navbar {
            background-color: #008080 !important; 
            backdrop-filter: none !important; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
        }
    </style>

</head>
<body>

    <!--Navbar-->

    <?php 
        include("includes/nav.php")
    ?>

    <!--Produto-->

    <section class="book-detail-container py-5">
        <div class="container">

            <div class="row g-5">
                
                <div class="col-lg-4 col-md-5 text-center">
                    
                    <img src="<?php echo htmlspecialchars($livro['Imagem']); ?>" 
                         class="img-fluid rounded shadow-lg mb-4 book-cover-fixed" 
                         alt="Capa de <?php echo htmlspecialchars($livro['Titulo']); ?>"
                         style="max-height: 500px; object-fit: cover;">
                    
                    <?php if (isset($_SESSION['user_id'])): ?>

                        <div class="dropdown w-100">
                            <button class="btn btn-download btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-cloud-arrow-down-fill me-2"></i>Descarregar Livro
                            </button>
                            <ul class="dropdown-menu w-50 text-center shadow border-0">
                                <li>
                                    <a class="dropdown-item py-2" href="processos/download.php?id=<?php echo $livro['ID_Livro']; ?>&format=pdf">
                                        <i class="bi bi-file-earmark-pdf me-2 text-danger"></i>Formato PDF
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="processos/download.php?id=<?php echo $livro['ID_Livro']; ?>&format=epub">
                                        <i class="bi bi-book me-2 text-success"></i>Formato ePub
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="processos/download.php?id=<?php echo $livro['ID_Livro']; ?>&format=mobi">
                                        <i class="bi bi-tablet me-2 text-primary"></i>Formato Mobi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <p class="small text-muted mt-2">Selecione o formato compatível com o seu leitor.</p>

                    <?php else: ?>

                        <a href="login.php?redirect_to=detalhes_livro.php?id=<?php echo $livro['ID_Livro']; ?>" 
                            class="btn btn-login-download btn-outline-danger btn-lg">
                            <i class="bi bi-lock-fill me-2"></i>Login para Descarregar
                        </a>
                        <p class="small text-muted mt-2">O download é exclusivo para membros registados.</p>

                    <?php endif; ?>

                </div>
                
                <div class="col-lg-8 col-md-7">
                    
                    <h1 class="display-5 fw-bold text-dark"><?php echo htmlspecialchars($livro['Titulo']); ?></h1>
                    
                    <p class="lead text-secondary mb-4">
                        Por: <span class="fw-bold" style="color: black;"><?php echo htmlspecialchars($livro['NomeAutor']); ?></span>
                    </p>

                    <div class="p-3 bg-light rounded border mb-4">
                        <h3 class="fw-bold fs-5 mb-3"><i class="bi bi-info-circle me-2"></i>Detalhes Técnicos</h3>
                        <ul class="list-unstyled text-muted mb-0 fs-6">
                            <li class="mb-2"><strong>Editora:</strong> <?php echo htmlspecialchars($livro['NomeEditora']); ?></li>
                            <li class="mb-2"><strong>Data de Publicação:</strong> <?php echo htmlspecialchars($livro['DataPublicacao']); ?></li>
                            <li><strong>ISBN:</strong> <?php echo htmlspecialchars($livro['ISBN']); ?></li>
                        </ul>
                    </div>

                    <h3 class="fw-bold fs-4 mt-4 mb-3">Sinopse</h3>
                    <div class="text-muted" style="line-height: 1.8;">
                        <?php echo nl2br(htmlspecialchars($livro['Descricao'])); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->

    <?php 
        include("includes/footer.php")
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>