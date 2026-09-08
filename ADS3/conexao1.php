<?php
$host = 'localhost';
$banco = 'catalogo';
$usuario = 'root';
$senha = 'admin';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
die("Erro ao conectar: " . $e->getMessage());
}


// baixa_estoque.php
require 'conexao.php';

$sql = "UPDATE produto SET estoque = estoque - ? WHERE id = ?";
$stmt = $pdo->prepare($sql);

$stmt->execute([3, 2]);

if ($stmt->rowCount() > 0) {
    echo "Sucesso: Estoque atualizado! " . $stmt->rowCount() . " linha(s) afetada(s).";
} else {
    echo "Aviso: Nenhuma alteração foi feita (ID inexistente ou estoque já atualizado).";
}
?>