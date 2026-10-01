<?php
header('Content-Type: application/json; charset=utf-8');

$q = $_GET['q'] ?? '';

$alunos = ['Ana Silva', 'Bruno Oliveira', 'Carlos Eduardo', 'Daniela Rocha'];

$resultado = array_filter($alunos, function($nome) use ($q) {
    return stripos($nome, $q) !== false;
});

echo json_encode(['alunos' => array_values($resultado)]);