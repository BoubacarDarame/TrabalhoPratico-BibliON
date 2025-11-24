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

<!--Body da página de FAQ's-->

<body class="body-auth">

    <a href="index.php" class="btn-back">
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

    <div class="faq-container-box">
        
        <h1 class="text-center text-white fw-bold mb-4">Perguntas Frequentes (FAQ)</h1>

        <div class="accordion" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        O acesso ao catálogo é realmente gratuito?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sim, 100% gratuito. A nossa missão é democratizar a leitura. Não existem custos ocultos, taxas de subscrição ou limites de download. Apenas pedimos o registo para garantir a segurança e a gestão do acervo.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Quais os formatos de ficheiros disponíveis para download?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        A maioria das nossas obras está disponível nos formatos mais populares: **PDF** (para leitura em PC/tablet), **ePub** (padrão para a maioria dos e-readers) e, em alguns casos, **MOBI** (compatível com dispositivos Kindle mais antigos).
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Posso ler os livros offline?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sim, claro! Assim que o ficheiro é descarregado para o seu dispositivo, ele é seu. Pode ler a obra em qualquer altura sem necessitar de uma conexão ativa à internet.
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>