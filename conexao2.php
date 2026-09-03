<?php
$host = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = 'admin';


$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se houve algum erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexao: " . $conexao->connect_error);
}


$conexao->set_charset("utf8mb4");
