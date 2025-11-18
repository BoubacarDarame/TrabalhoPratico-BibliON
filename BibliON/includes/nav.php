<nav class="navbar navbar-expand-xl py-3 custom-navbar" data-bs-theme="dark">
    <div class="container-fluid">
        
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="imgs/imagens/Biblion.png" alt="Logo da Empresa" style="height: 80px;">

            <span class="d-none d-sm-block ms-3 fs-6 text-white border-start ps-3 border-white">
                A biblioteca online
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCustomContent" aria-controls="navbarCustomContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCustomContent">
            
            <form class="d-flex w-100 mx-auto my-3 my-xl-0" role="search" style="max-width: 400px;">
                <div class="input-group">
                    <input class="form-control border-end-0" type="search" placeholder="O que procura?" aria-label="Pesquisar">
                    <button class="btn btn-outline-secondary border-start-0 text-white" type="submit" style="border-color: rgba(255,255,255,0.2);">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <ul class="navbar-nav align-items-center">
                
                <li class="nav-item mx-2">
                    <a class="nav-link nav-text-link" href="produtos.php">Produtos</a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link nav-text-link" href="sobrenos.php">Sobre Nós</a>
                </li>

                <li class="nav-item ms-2">
                    <a class="nav-link btn-login-icon" href="login.php" aria-label="Login">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>