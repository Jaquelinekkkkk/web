<?php
require_once 'funcoes.php';
iniciarSessaoSegura();
exigirLogin();

$usuario = htmlspecialchars(
    $_SESSION['usuario'],
    ENT_QUOTES,
    'UTF-8'
);

$loginEm = htmlspecialchars(
    $_SESSION['login_em'],
    ENT_QUOTES,
    'UTF-8'
);
?>

<h1>Área restrita</h1>

<p>Bem-vindo, <?php echo $usuario; ?>!</p>
<p>Login realizado em: <?php echo $loginEm; ?></p>

<p>Esta página só pode ser acessada por usuários autenticados.</p>

<a href="logout.php">Sair</a>