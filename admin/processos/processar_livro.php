<?php
session_start();
include '../includes/connection.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $id_editora = $_POST['editora'] ?? '';
    $id_autor = $_POST['autor'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $data_publicacao = $_POST['data_publicacao'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    
    $caminho_para_bd = null;

    if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['name'])) {
        
        if ($_FILES['imagem']['error'] !== UPLOAD_ERR_OK) {
            die("Erro no upload da imagem: Código de erro " . $_FILES['imagem']['error']);
        }

        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $permitidos = ['jpg', 'jpeg', 'png', 'webp'];
        
        if (in_array(strtolower($extensao), $permitidos)) {
            
            $nome_ficheiro = $_FILES['imagem']['name'];
            $pasta_destino = '../../imagens/'; 
            $destino_final = $pasta_destino . $nome_ficheiro;

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino_final)) {
                $caminho_para_bd = 'imagens/' . $nome_ficheiro;
            } else {
                die("Erro: Não foi possível mover o ficheiro para '$destino_final'. Verifique se a pasta existe.");
            }
        } else {
            die("Erro: Formato de imagem não permitido. Use JPG, PNG ou WEBP.");
        }
    }

    try {
        if (!empty($id)) {

            // EDITAR LIVRO
            if ($caminho_para_bd) {
                $sql = "UPDATE livros SET Titulo=?, ID_Editora=?, ID_Autor=?, ISBN=?, DataPublicacao=?, Descricao=?, Imagem=? WHERE ID_Livro=?";
                $params = [$titulo, $id_editora, $id_autor, $isbn, $data_publicacao, $descricao, $caminho_para_bd, $id];
            } else {
                $sql = "UPDATE livros SET Titulo=?, ID_Editora=?, ID_Autor=?, ISBN=?, DataPublicacao=?, Descricao=? WHERE ID_Livro=?";
                $params = [$titulo, $id_editora, $id_autor, $isbn, $data_publicacao, $descricao, $id];
            }
            
            $stmt = $dbh->prepare($sql);
            $stmt->execute($params);
            
            header("Location: ../gerir_livros.php?msg=editado");

        } else {

            // CRIAR NOVO LIVRO
            $img_final = $caminho_para_bd ? $caminho_para_bd : 'imagens/sem_capa.jpg';
            $sql = "INSERT INTO livros (Titulo, ID_Editora, ID_Autor, ISBN, DataPublicacao, Descricao, Imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$titulo, $id_editora, $id_autor, $isbn, $data_publicacao, $descricao, $img_final]);
            
            header("Location: ../gerir_livros.php?msg=criado");
        }

    } catch (PDOException $e) {
        echo "Erro na Base de Dados: " . $e->getMessage();
        echo "<br><a href='formulario_livros.php'>Voltar</a>";
    }

} else {
    header("Location: ../gerir_livros.php");
}
?>