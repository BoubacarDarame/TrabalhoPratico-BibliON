<?php
session_start();
include 'includes/connection.php';
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') { header("Location: ../login.php"); exit; }

$livro = null;
$titulo_pag = "Adicionar Novo Livro";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("SELECT * FROM livros WHERE ID_Livro = :id");
    $stmt->execute([':id' => $id]);
    $livro = $stmt->fetch();
    $titulo_pag = "Editar Livro: " . $livro['Titulo'];
}

$editoras = $dbh->query("SELECT * FROM editoras")->fetchAll();
$autores = $dbh->query("SELECT * FROM autores")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblion</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../icones/favicon.ico">
    <link href="css/admin_style.css" rel="stylesheet">

</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <div class="main-content">
        <div class="container-fluid">
            <h2 class="mb-4 fw-bold"><?php echo $titulo_pag; ?></h2>

            <div class="card border-0 shadow-sm p-4" style="max-width: 800px;">
                <form action="processos/processar_livro.php" method="POST" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?php echo $livro['ID_Livro'] ?? ''; ?>">

                    <div class="mb-3">
                        <label class="form-label">Título do Livro</label>
                        <input type="text" name="titulo" class="form-control" required
                               value="<?php echo $livro['Titulo'] ?? ''; ?>">
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Editora</label>
                            <select name="editora" class="form-select" required>
                                <option value="">Selecione...</option>
                                <?php foreach($editoras as $ed): ?>
                                    <option value="<?php echo $ed['ID_Editora']; ?>" 
                                        <?php echo (isset($livro) && $livro['ID_Editora'] == $ed['ID_Editora']) ? 'selected' : ''; ?>>
                                        <?php echo $ed['NomeEditora']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Autor</label>
                            <select name="autor" class="form-select" required>
                                <option value="">Selecione...</option>
                                <?php foreach($autores as $ed): ?>
                                    <option value="<?php echo $ed['ID_Autor']; ?>" 
                                        <?php echo (isset($livro) && $livro['ID_Autor'] == $ed['ID_Autor']) ? 'selected' : ''; ?>>
                                        <?php echo $ed['NomeAutor']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" name="isbn" class="form-control" 
                                   value="<?php echo $livro['ISBN'] ?? ''; ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Data de Publicação</label>
                            <input type="text" name="data_publicacao" class="form-control" 
                                   placeholder="Ex: Maio de 2024"
                                   value="<?php echo $livro['DataPublicacao'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sinopse</label>
                        <textarea name="descricao" class="form-control" rows="5"><?php echo $livro['Descricao'] ?? ''; ?></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Capa do Livro</label>
                        <input type="file" name="imagem" class="form-control">
                        <?php if(isset($livro['Imagem'])): ?>
                            <div class="mt-2">
                                <span class="small text-muted">Imagem Atual:</span><br>
                                <img src="../<?php echo $livro['Imagem']; ?>" height="100" class="rounded border">
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100" style="background-color: #008080; border: none;">
                        Guardar Alterações
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>