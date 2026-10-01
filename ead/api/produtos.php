<?php
header('Content-Type: application/json; charset=utf-8');

$produtos = [
    ['id' => 1, 'nome' => 'Teclado', 'preco' => 89.90],
    ['id' => 2, 'nome' => 'Mouse', 'preco' => 49.90],
    ['id' => 3, 'nome' => 'Monitor', 'preco' => 799.00],
];

echo json_encode([
    'ok' => true,
    'produtos' => $produtos
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);