<?php
require "conexao.php";
$busca = $_GET["busca"] ?? "";
// NUNCA faca isto em codigo real
$sql = "SELECT id, titulo, autor FROM livros WHERE titulo LIKE '%$busca%'";
echo "<p>SQL: " . htmlspecialchars($sql) . "</p>";
$r = $conexao->query($sql);
if (!$r) { echo "ERRO: " . $conexao->error; exit; }
while ($l = $r->fetch_assoc()) echo htmlspecialchars($l["titulo"]) . "<br>";
