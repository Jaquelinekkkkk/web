<?php
require_once 'funcoes.php';
iniciarSessaoSegura();

$usuarioDigitado = $_POST['usuario'] ?? '';
$senhaDigitada = $_POST['senha'] ?? '';

if (
    $usuarioDigitado === 'aluno'
    && $senhaDigitada === '123456'
) {
    session_regenerate_id(true);

    $_SESSION['usuario'] = $usuarioDigitado;
    $_SESSION['login_em'] = date('Y-m-d H:i:s');

    header('Location: area-restrita.php');
    exit;
}