<?php
require 'conexao.php';

$sql = "UPDATE produto SET estoque = estoque - ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([3, 2]);

echo "Linhas afetadas: " . $stmt->rowCount();
