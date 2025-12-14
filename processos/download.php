<?php
session_start();
include '../includes/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id']) && isset($_GET['format'])) {
    
    $id_livro = $_GET['id'];
    $formato = strtolower($_GET['format']);
    
    $formatos_validos = ['pdf', 'epub', 'mobi'];
    
    if (!in_array($formato, $formatos_validos)) {
        die("Formato inválido.");
    }

    try {
        $stmt = $dbh->prepare("SELECT Titulo FROM livros WHERE ID_Livro = :id");
        $stmt->bindParam(':id', $id_livro);
        $stmt->execute();
        $livro = $stmt->fetch();

        if ($livro) {
            $nome_ficheiro = preg_replace('/[^A-Za-z0-9]/', '_', $livro['Titulo']);
            $nome_completo = $nome_ficheiro . "." . $formato;

            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $nome_completo . '"');
            
            exit;

        } else {
            echo "Livro não encontrado.";
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

} else {
    header("Location: ../produtos.php");
}
?>