<?php
require "conexao.php";
$busca = $_GET["busca"] ?? "";
$stmt = $conexao->prepare(
"SELECT id, titulo, autor FROM livros WHERE titulo LIKE ?");
$termo = "%" . $busca . "%"; // os % vao no VALOR
$stmt->bind_param("s", $termo);
$stmt->execute();
$r = $stmt->get_result();
while ($l = $r->fetch_assoc()) {
echo htmlspecialchars($l["titulo"]) . "<br>";
}
