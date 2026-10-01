<?php
require_once "conexao.php";

$sql = "SELECT livros.id, livros.titulo, livros.autor, livros.ano, generos.nome AS genero 
        FROM livros 
        LEFT JOIN generos ON livros.genero_id = generos.id 
        ORDER BY livros.titulo";

$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Livros</title>
</head>
<body>
    <h1>Livros Cadastrados</h1>
    <a href="novo.php">Cadastrar Novo</a><br><br>
    
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Gênero</th>
            <th>Ações</th>
        </tr>
        <?php while ($l = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= htmlspecialchars($l['titulo'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($l['autor'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= $l['ano'] ?></td>
            <td><?= htmlspecialchars($l['genero'] ?? '(sem gênero)', ENT_QUOTES, 'UTF-8') ?></td>
            <td>
                <a href="editar.php?id=<?= $l['id'] ?>">Editar</a>
                <form action="excluir.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $l['id'] ?>">
                    <button type="submit" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>