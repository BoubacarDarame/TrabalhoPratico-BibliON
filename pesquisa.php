<?php
session_start();
include 'includes/connection.php';

$termo = "";
$resultados = [];

if (isset($_GET['q'])) {
    $termo = trim($_GET['q']);
}

if (!empty($termo)) {
    try {
        $sql = "SELECT 
                    livros.ID_Livro, 
                    livros.Titulo, 
                    livros.Imagem, 
                    editoras.NomeEditora,
                    GROUP_CONCAT(DISTINCT autores.NomeAutor SEPARATOR ', ') as Autores,
                    GROUP_CONCAT(DISTINCT categorias.NomeCategoria SEPARATOR ', ') as ListaCategorias
                FROM livros
                INNER JOIN editoras ON livros.ID_Editora = editoras.ID_Editora
                LEFT JOIN livro_autor ON livros.ID_Livro = livro_autor.ID_Livro
                LEFT JOIN autores ON livro_autor.ID_Autor = autores.ID_Autor
                LEFT JOIN livro_categoria ON livros.ID_Livro = livro_categoria.ID_Livro
                LEFT JOIN categorias ON livro_categoria.ID_Categoria = categorias.ID_Categoria
                
                WHERE 
                    livros.Titulo LIKE :termo 
                    OR autores.NomeAutor LIKE :termo 
                    OR editoras.NomeEditora LIKE :termo
                    OR categorias.NomeCategoria LIKE :termo
                
                GROUP BY livros.ID_Livro 
                ORDER BY livros.Titulo ASC";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':termo', "%" . $termo . "%");
        $stmt->execute();
        $resultados = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo "Erro na pesquisa: " . $e->getMessage();
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
    
    <style>
        .custom-navbar {
            background-color: #008080 !important; 
            backdrop-filter: none !important; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>

</head>
<body>

    <?php include("includes/nav.php"); ?>

    <div class="container page-container-adjust pb-5">
        
        <div class="mb-5 border-bottom pb-3">
            <h2 class="fw-bold text-dark">
                Resultados para: <span style="color: #008080;">"<?php echo htmlspecialchars($termo); ?>"</span>
            </h2>
            <p class="text-muted mb-0">Foram encontrados <?php echo count($resultados); ?> livro(s) correspondente(s).</p>
        </div>

        <?php if (empty($termo)): ?>
            <div class="alert alert-warning">Por favor, escreva algo para pesquisar.</div>
        
        <?php elseif (count($resultados) == 0): ?>
            <div class="text-center py-5">
                <i class="bi bi-search fs-1 d-block mb-3 text-secondary"></i>
                <h4 class="text-dark">Ops! Não encontrámos nada.</h4>
                <p class="text-muted">Tente verificar a ortografia ou pesquisar por apenas uma palavra.</p>
                <a href="produtos.php" class="btn btn-primary mt-3" style="background-color: #008080; border:none;">
                    Ver Catálogo Completo
                </a>
            </div>

        <?php else: ?>
            
            <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4">
                
                <?php foreach ($resultados as $livro): ?>
                    <div class="col">
                        <div class="card h-100 card-product-grid">
                            
                            <div style="overflow: hidden; border-radius: 8px 8px 0 0;">
                                <img src="<?php echo htmlspecialchars($livro['Imagem']); ?>" 
                                     class="card-product-img" 
                                     alt="<?php echo htmlspecialchars($livro['Titulo']); ?>">
                            </div>
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-dark fs-6 mb-1 text-truncate" title="<?php echo htmlspecialchars($livro['Titulo']); ?>">
                                    <?php echo htmlspecialchars($livro['Titulo']); ?>
                                </h5>
                                
                                <p class="card-text text-muted small mb-3 text-truncate">
                                    <?php echo htmlspecialchars($livro['Autores']); ?>
                                </p>
                                
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="badge bg-light text-dark border">
                                            <?php echo htmlspecialchars($livro['NomeEditora']); ?>
                                        </span>
                                    </div>

                                    <a href="detalhes_livro.php?id=<?php echo $livro['ID_Livro']; ?>" 
                                       class="btn btn-details w-100 btn-sm fw-bold">
                                        Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

    <?php include("includes/footer.php"); ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>