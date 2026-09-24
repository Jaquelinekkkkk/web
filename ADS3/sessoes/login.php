<?php
require_once 'funcoes.php';
iniciarSessaoSegura();

if (usuarioEstaLogado()) {
    header('Location: area-restrita.php');
    exit;
}
?>
<form action="autenticar.php" method="post">
  <label for="usuario">Usuário:</label>
  <input type="text" id="usuario" name="usuario" required>

  <br><br>

  <label for="senha">Senha:</label>
  <input type="password" id="senha" name="senha" required>

  <br><br>

  <button type="submit">Entrar</button>
</form>