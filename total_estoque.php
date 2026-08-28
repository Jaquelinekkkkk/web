<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT SUM(preco * estoque) AS total FROM produto");
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Valor total do estoque: R$ " . number_format($resultado['total'], 2, ',', '.');
