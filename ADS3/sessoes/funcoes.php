<?php

function iniciarSessaoSegura(): void
{
    $httpsAtivo =
        !empty($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] !== 'off';

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',

        'secure' => $httpsAtivo,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}
function usuarioEstaLogado(): bool
{
    return isset($_SESSION['usuario']);
}

function exigirLogin(): void
{
    if (!usuarioEstaLogado()) {
        header('Location: login.php');
        exit;
    }
}