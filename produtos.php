<?php 
session_start();
include("includes/connection.php");

$sql = "SELECT livros.*, editoras.NomeEditora, autores.NomeAutor 
        FROM livros 
        LEFT JOIN editoras ON livros.ID_Editora = editoras.ID_Editora 
        LEFT JOIN autores ON livros.ID_Autor = autores.ID_Autor 
        ORDER BY livros.Titulo ASC";
$stmt = $dbh->query($sql);
$livros = $stmt->fetchAll();

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
<body>

    <!--Navbar-->

    <?php 
        include("includes/nav.php")
    ?>

    <!--Imagem e texto inicial-->

    <div class="grid-container">

        <div class="item1">

            <img class="item1-bg-image" src="imagens/fundo_p.jpg">

            <h1 class="display-3 fw-bold text-center">
                Livros
            </h1>

            <p class="lead fs-4 text-center intro-text"> 
                A partir da nossa loja online, poderá desfrutar dos seus livros favoritos e muito mais. 
                <br>Cada livro é uma porta aberta para novas ideias.
            </p>
        </div>
    </div>

    <!--Produtos-->

    <section class="products-section py-5">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h2 id="todosProdutos" class="display-5 fw-bold text-center">Todos os livros</h2>
                    <hr>
                </div>
            </div>

            <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4">

                <?php if (count($livros) > 0): ?>
                    
                    <?php foreach($livros as $livro): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">

                            <a href="detalhes_livro.php?id=<?php echo $livro['ID_Livro']; ?>" aria-label="Ver detalhes">
                                <?php 
                                    $imagem_exibir = $livro['Imagem'];
                                    if (empty($imagem_exibir) || !file_exists($imagem_exibir)) {
                                        $imagem_exibir = "imagens/sem_capa.jpg";
                                    }
                                ?>
                                <img src="<?php echo htmlspecialchars($imagem_exibir); ?>" 
                                    class="card-img-top" 
                                    alt="Capa do livro <?php echo htmlspecialchars($livro['Titulo']); ?>"
                                    style="height: 350px; object-fit: cover;">   
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="detalhes_livro.php?id=<?php echo $livro['ID_Livro']; ?>" class="text-dark text-decoration-none">
                                        <?php echo htmlspecialchars($livro['Titulo']); ?>
                                    </a>
                                </h5>

                                <p class="card-text fs-sm text-muted mb-1">
                                    Autor(a): <?php echo htmlspecialchars($livro['NomeAutor'] ?? 'Desconhecido'); ?>
                                </p>
                                
                                <p class="card-text fs-sm text-muted">
                                    Editor(a): <?php echo htmlspecialchars($livro['NomeEditora']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="alert alert-warning">Ainda não existem livros registados.</p>
                    </div>
                <?php endif; ?>

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