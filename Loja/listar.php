<?php
require_once 'conexao.php';

// Busca os produtos
$stmt = $pdo->query("SELECT * FROM produtos ORDER BY id ASC");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="wrapper" class="d-flex flex-grow-1">
        <!-- Sidebar -->
        <nav class="bg-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="min-height: 100vh; width: 250px;">
            <div class="sidebar-heading text-center text-white py-4">
                <strong>GERENCIAMENTO<br>BANCO DE DADOS</strong>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="listar.php">Produtos</a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div id="content-wrapper" class="flex-grow-1 d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-light bg-white shadow-sm mb-4">
                    <div class="container-fluid">
                        <span class="navbar-text ms-auto">Administrador</span>
                    </div>
                </nav>

                <!-- Main Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Lista de Produtos</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($produtos) > 0): ?>
                                            <?php foreach ($produtos as $row): ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= htmlspecialchars($row['nome']); ?></td>
                                                    <td>R$ <?= number_format($row['preco'], 2, ',', '.'); ?></td>
                                                    <td><?= $row['quantidade']; ?></td>
                                                    <td>
                                                        <a href="atualizar.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                                        <a href="apagar.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Apagar</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5">Nenhum produto cadastrado.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <!-- Footer -->
            <footer class="bg-white text-center py-3 shadow-sm mt-auto">
                <span>Sem Copyright © Feito por João 2F 2025</span>
            </footer>

        </div> <!-- fecha content-wrapper -->
    </div> <!-- fecha wrapper -->
</body>
</html>