<?php
require 'conexao.php';
require 'Produto.php';
require 'ProdutoDAO.php';

$dao = new ProdutoDAO($pdo);
$produtos = $dao->listarTodos();
?>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $p) { ?>
            <!-- Destaque visual caso o estoque esteja baixo (cor de fundo vermelha clara) -->
            <tr <?php if ($p->estoqueBaixo()) { echo 'style="background-color: #ffcccc;"'; } ?>>
                <td><?php echo $p->id; ?></td>
                <td><?php echo $p->nome; ?></td>
                <td>R$ <?php echo number_format($p->preco, 2, ',', '.'); ?></td>
                <td><?php echo $p->estoque; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
