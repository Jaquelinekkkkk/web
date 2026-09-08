<?php
require_once "conexao.php";

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$titulo = trim($_POST['titulo'] ?? '');
$autor = trim($_POST['autor'] ?? '');
$ano = filter_input(INPUT_POST, "ano", FILTER_VALIDATE_INT);
$genero_id = filter_input(INPUT_POST, "genero_id", FILTER_VALIDATE_INT);

if (!$id || $titulo === '' || $autor === '' || !$ano || !$genero_id) {
    exit("Dados inválidos fornecidos.");
}

$stmt = $conexao->prepare("UPDATE livros SET titulo = ?, autor = ?, ano = ?, genero_id = ? WHERE id = ?");
$stmt->bind_param("ssiii", $titulo, $autor, $ano, $genero_id, $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao atualizar registro.";
}