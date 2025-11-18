<!DOCTYPE html>
<html lang="pt-pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="imgs/icones/favicon.ico">
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

            <img class="item1-bg-image" src="imgs/imagens/Fundo.jpg">

            <h1 class="display-3 fw-bold text-center">
                Sobre Nós
            </h1>

            <p class="lead fs-4 text-center intro-text"> 
                Conheça a nossa história, a nossa missão e o que oferecemos para si.
            </p>
        </div>
    </div>

    <!--Informações-->

    <section class="page-content-section p-0">

        <div class="container py-5">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <h6 class="text-uppercase fw-bold mb-2">A Nossa História</h6>
                    <h2 class="mb-4 fw-bold">Mais do que livros, partilhamos cultura.</h2>
                    <p class="lead text-muted">
                        A BibliON nasceu da necessidade de tornar a leitura mais acessível, rápida e descomplicada na era digital.
                    </p>
                    <p class="text-muted">
                        Acreditamos que cada livro tem o leitor perfeito à sua espera. O nosso algoritmo de pesquisa e a nossa curadoria cuidadosa garantem que encontra não só o que procura, mas também aquilo que nem sabia que precisava ler. Desde os clássicos intemporais aos lançamentos mais recentes, a nossa prateleira virtual nunca fecha.
                    </p>
                </div>
                
                <div class="col-lg-6">
                    
                    <img src="imgs/imagens/Biblioteca.jpg" class="img-fluid rounded-3 shadow" alt="Estante de livros moderna">
                </div>
            </div>
        </div>

        <div class="stats-banner mt-5">

            <div class="container">
                <div class="row text-center g-4">
                    <div class="col-md-4 stats-item">
                        <h2>+10.000</h2>
                        <p>Títulos Disponíveis</p>
                    </div>
                    <div class="col-md-4 stats-item">
                        <h2>+50.000</h2>
                        <p>Downloads Feitos</p>
                    </div>
                    <div class="col-md-4 stats-item">
                        <h2>+5.000</h2>
                        <p>Leitores Satisfeitos</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5 mt-5">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Porquê a BibliON?</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    O nosso compromisso é consigo e com a sua experiência de leitura.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-4 text-center">

                    <div class="mb-3">
                        <i class="bi bi-unlock-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold">100% Gratuito</h5>
                    <p class="text-muted small px-3">
                        Acreditamos na educação livre. Todos os livros do nosso catálogo podem ser descarregados sem custos, subscrições ou taxas ocultas.
                    </p>
                </div>
                
                <div class="col-md-4 text-center">

                    <div class="mb-3">
                        <i class="bi bi-cloud-arrow-down-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold">Download Instantâneo</h5>
                    <p class="text-muted small px-3">
                        Esqueça os envios e as esperas. Com apenas um clique, o livro é seu e fica guardado no seu dispositivo para ler offline.
                    </p>
                </div>
                
                <div class="col-md-4 text-center">

                    <div class="mb-3">
                        <i class="bi bi-tablet-landscape-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold">Multi-Formato</h5>
                    <p class="text-muted small px-3">
                        Disponibilizamos ficheiros em PDF, ePub e MOBI, garantindo compatibilidade total com o seu Kindle, Tablet, Telemóvel ou PC.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="container text-center pb-5 mb-4">
            <hr class="my-5">
            <h3 class="mb-5">Pronto para a sua próxima aventura literária?</h3>
            <a href="produtos.php" class="btn btn-primary btn-lg px-5 rounded-pill">Explorar Catálogo</a>
        </div>

    </section>

    <!--Footer-->

    <?php 
        include("includes/footer.php")
    ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>