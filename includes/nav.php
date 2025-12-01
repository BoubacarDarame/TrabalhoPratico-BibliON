<nav class="navbar navbar-expand-xl py-3 custom-navbar" data-bs-theme="dark">
    <div class="container-fluid">
        
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="imagens/Biblion.png" alt="Logo da Empresa" style="height: 80px;">

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

            <?php

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            ?>

            <ul class="navbar-nav align-items-center">
                
                <li class="nav-item mx-2">
                    <a class="nav-link nav-text-link" href="produtos.php">Produtos</a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link nav-text-link" href="sobrenos.php">Sobre Nós</a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
        
                <?php 
                    $inicial = strtoupper(substr($_SESSION['user_name'], 0, 1));
                ?>

                <li class="nav-item ms-2 dropdown">

                    <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            <?php echo $inicial; ?>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0" style="background-color: rgba(255, 255, 255, 0.95); backdrop-filter: blur(5px);">
                
                        <li><h6 class="dropdown-header text-muted">Olá, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h6></li>
                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="bi bi-person-gear me-2 text-primary"></i> Página de Utilizador
                            </a>
                        </li>
                
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="autenticacao/logout.php">
                                <i class="bi bi-box-arrow-right me-2"></i> Sair
                            </a>
                        </li>
                    </ul>
                </li>

                <?php else: ?>

                    <li class="nav-item ms-2">
                        <a class="nav-link btn-login-icon" href="login.php" aria-label="Login">
                            <i class="bi bi-person-circle fs-4"></i>
                        </a>
                    </li>

                <?php endif; ?>
                
                </li>
            </ul>
        </div>
    </div>
</nav>