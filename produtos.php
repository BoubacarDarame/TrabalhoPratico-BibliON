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

            <img class="item1-bg-image" src="imagens/Fundo_P.jpg">

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

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=1" aria-label="Ver detalhes de A Criada">
                            <img src="imagens/A_criada.jpg" class="card-img-top" alt="Capa do livro A Criada">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=1" class="text-dark text-decoration-none">
                                    A Criada
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): Freida McFadden</p>
                            <p class="card-text fs-sm text-muted">Editor(a): Alma do Livros</p>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=2" aria-label="Ver detalhes de O Segredo dos Segredos">
                            <img src="imagens/O_segredo_dos_segredos.jpg" class="card-img-top" alt="Capa do livro O Segredo dos Segredos">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=2" class="text-dark text-decoration-none">
                                    O Segredo dos Segredos
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): Dan Brown</p>
                            <p class="card-text fs-sm text-muted">Editor(a): Planeta</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=3" aria-label="Ver detalhes de O Protocolo Caos">
                            <img src="imagens/Protocolo_Caos.jpg" class="card-img-top" alt="Capa do livro O Protocolo Caos">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=3" class="text-dark text-decoration-none">
                                    O Protocolo Caos
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): José Rodrigues dos Santos</p>
                            <p class="card-text fs-sm text-muted">Editor(a): Planeta</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=4" aria-label="Ver detalhes de A Biblioteca da Meia-Noite">
                            <img src="imagens/Biblioteca_da_Meia_Noite.jpg" class="card-img-top" alt="Capa do livro A Biblioteca da Meia-Noite">
                        </a>
                        
                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=4" class="text-dark text-decoration-none">
                                    A Biblioteca da Meia-Noite
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): Matt Haig</p>
                            <p class="card-text fs-sm text-muted">Editor(a): TopSeller</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=1" aria-label="Ver detalhes de A Criada">
                            <img src="imagens/A_criada.jpg" class="card-img-top" alt="Capa do livro A Criada">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=1" class="text-dark text-decoration-none">
                                    A Criada
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): Freida McFadden</p>
                            <p class="card-text fs-sm text-muted">Editor(a): Alma do Livros</p>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=2" aria-label="Ver detalhes de O Segredo dos Segredos">
                            <img src="imagens/O_segredo_dos_segredos.jpg" class="card-img-top" alt="Capa do livro O Segredo dos Segredos">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=2" class="text-dark text-decoration-none">
                                    O Segredo dos Segredos
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): Dan Brown</p>
                            <p class="card-text fs-sm text-muted">Editor(a): Planeta</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=3" aria-label="Ver detalhes de O Protocolo Caos">
                            <img src="imagens/Protocolo_Caos.jpg" class="card-img-top" alt="Capa do livro O Protocolo Caos">
                        </a>

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=3" class="text-dark text-decoration-none">
                                    O Protocolo Caos
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): José Rodrigues dos Santos</p>
                            <p class="card-text fs-sm text-muted">Editor(a): Planeta</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 shadow-sm border-0">

                        <a href="detalhes_livro.php?id=4" aria-label="Ver detalhes de A Biblioteca da Meia-Noite">
                            <img src="imagens/Biblioteca_da_Meia_Noite.jpg" class="card-img-top" alt="Capa do livro A Biblioteca da Meia-Noite">
                        </a>
                        
                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="detalhes_livro.php?id=4" class="text-dark text-decoration-none">
                                    A Biblioteca da Meia-Noite
                                </a>
                            </h5>

                            <p class="card-text fs-sm text-muted mb-1">Autor(a): Matt Haig</p>
                            <p class="card-text fs-sm text-muted">Editor(a): TopSeller</p>
                        </div>
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