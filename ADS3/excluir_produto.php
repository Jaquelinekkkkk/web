<?php
require 'conexao.php';

$id = 2;

// Roda o SELECT com o mesmo WHERE para conferir o que será apagado
$stmt = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Produto que será apagado: " . $produto['nome'] . "<br>";

// Executa o DELETE
$stmtDelete = $pdo->prepare("DELETE FROM produto WHERE id = ?");
$stmtDelete->execute([$id]);
