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

    <section class="page-content-section">
        
        <div class="container">
            
            <div class="row align-items-center g-5 mb-5">
                
                <div class="col-lg-7">
                    <h3>A Nossa Missão</h3>
                    <p class="fs-5 text-muted">Aqui pode descrever o objetivo principal da BibliON. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p class="text-muted">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                
                <div class="col-lg-5">
                    <img src="https://via.placeholder.com/500x350.png?text=Imagem+da+Equipa" class="img-fluid rounded shadow-sm" alt="A equipa BibliON">
                </div>

            </div> <hr class="my-5">

            <div class="row text-center g-4">
                <div class="col-12 mb-3">
                    <h3>O Que Oferecemos</h3>
                </div>
                
                <div class="col-md-4">
                    <i class="bi bi-book-half fs-1 text-primary"></i>
                    <h5 class="fw-bold my-3">Vasta Biblioteca</h5>
                    <p class="text-muted">Acesso a milhares de títulos de diversos géneros, autores e editoras.</p>
                </div>
                
                <div class="col-md-4">
                    <i class="bi bi-search fs-1 text-primary"></i>
                    <h5 class="fw-bold my-3">Pesquisa Fácil</h5>
                    <p class="text-muted">Encontre exatamente o que procura com o nosso sistema de pesquisa avançada.</p>
                </div>
                
                <div class="col-md-4">
                    <i class="bi bi-headset fs-1 text-primary"></i>
                    <h5 class="fw-bold my-3">Suporte Dedicado</h5>
                    <p class="text-muted">A nossa equipa está sempre disponível para ajudar com qualquer questão técnica.</p>
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