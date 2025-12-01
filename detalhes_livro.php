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

    <!--Produto-->

    <section class="book-detail-container py-5">
        <div class="container">
            <div class="row g-5">
                
                <div class="col-lg-4 col-md-5 text-center">
                    <img src="https://via.placeholder.com/400x600.png?text=Capa+do+Livro" 
                         class="img-fluid rounded shadow-lg mb-4" 
                         alt="Capa do Livro">
                         
                    <a href="#" class="btn btn-download btn-lg w-100">
                        <i class="bi bi-cloud-arrow-down-fill me-2"></i>Download Gratuito
                    </a>
                    <p class="small text-muted mt-2">Formatos disponíveis: PDF, ePub</p>
                </div>
                
                <div class="col-lg-8 col-md-7">
                    <h1 class="display-5 fw-bold">O Título Fantástico do Livro</h1>
                    <p class="lead text-secondary mb-4">
                        Por: <span class="fw-bold text-dark">Nome do Autor(a)</span>
                    </p>

                    <h3 class="fw-bold fs-5 mt-4">Detalhes Técnicos</h3>
                    <ul class="list-unstyled text-muted mb-4 fs-6">
                        <li><strong>Editora:</strong> Nome da Editora</li>
                        <li><strong>Publicação:</strong> 2024-01-01</li>
                        <li><strong>ISBN:</strong> 978-1234567890</li>
                    </ul>

                    <h3 class="fw-bold fs-5 mt-4">Sinopse</h3>
                    <p class="text-muted">
                        Aqui entra a descrição detalhada do livro. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    </p>
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