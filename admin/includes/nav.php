<div id="sidebarOverlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

<div class="d-lg-none p-3 bg-dark text-white d-flex justify-content-between align-items-center fixed-top shadow-sm" style="z-index: 1001; height: 60px;">
    <span class="fs-5 fw-bold d-flex align-items-center">
        <i class="bi bi-book-half me-2" style="color: #008080;"></i> BibliON Admin
    </span>
    <button class="btn btn-outline-teal" onclick="toggleSidebar()">
        <i class="bi bi-list fs-2"></i>
    </button>
</div>

<nav class="sidebar d-flex flex-column flex-shrink-0 p-3" id="adminSidebar">
    
    <a href="dashboard.php" class="d-flex align-items-center mb-4 mb-md-0 me-md-auto text-white text-decoration-none px-3">
        <i class="bi bi-book-half fs-2 me-2" style="color: #008080;"></i>
        <span class="fs-4 fw-bold">BibliON Admin</span>
    </a>
    
    <hr class="text-white-50">
    
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="gerir_livros.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gerir_livros.php' ? 'active' : ''; ?>">
                <i class="bi bi-book"></i>
                Gerir Livros
            </a>
        </li>
        <li>
            <a href="gerir_utilizadores.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gerir_utilizadores.php' ? 'active' : ''; ?>">
                <i class="bi bi-people"></i>
                Utilizadores
            </a>
        </li>
        <li>
            <a href="gerir_problemas.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gerir_problemas.php' ? 'active' : ''; ?>">
                <i class="bi bi-exclamation-triangle"></i>
                Problemas
            </a>
        </li>
    </ul>
    
    <hr class="text-white-50">
    
    <div class="dropdown px-3">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="admin-icon rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
            </div>
            <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>
        </a>
        <ul class="dropdown-menu admin-dropdown text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="../index.php">Voltar ao Site</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../autenticacao/logout.php">Terminar Sessão</a></li>
        </ul>
    </div>
</nav>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }
</script>