<?php
require_once 'conexao.php'; // garante que $pdo esteja disponível

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            header("Location: listar.php?msg=deletado");
            exit;
        } else {
            echo "Erro ao tentar apagar o produto.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    header("Location: listar.php");
    exit;
}
