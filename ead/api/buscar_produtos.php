<?php
header('Content-Type: application/json; charset=utf-8');

$q = $_GET['q'] ?? '';
$q = trim($q);

$produtos = [
    ['id' => 1, 'nome' => 'Teclado'],
    ['id' => 2, 'nome' => 'Mouse'],
    ['id' => 3, 'nome' => 'Monitor'],
    ['id' => 4, 'nome' => 'Webcam'],
];

$filtrados = array_filter($produtos, function ($produto) use ($q) {
    return stripos($produto['nome'], $q) !== false;
});

echo json_encode([
    'ok' => true,
    'produtos' => array_values($filtrados)
], JSON_UNESCAPED_UNICODE);

function renderizarResultado(produtos) {
  resultadoBusca.innerHTML = "";

  if (produtos.length === 0) {
    statusBusca.textContent = "Nenhum produto encontrado.";
    return;
  }

  statusBusca.textContent = `${produtos.length} produto(s) encontrado(s).`;

  produtos.forEach(produto => {
    const li = document.createElement("li");
    li.textContent = produto.nome;
    resultadoBusca.appendChild(li);
  });
}