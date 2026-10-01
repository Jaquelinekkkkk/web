<?php
require "conexao.php";
$generos = $conexao->query("SELECT id, nome FROM generos ORDER BY nome");
?>
<form method="post" action="salvar.php">
 <p>Título: <input type="text" name="titulo" required></p>
 <p>Autor: <input type="text" name="autor" required></p>
 <p>Ano: <input type="number" name="ano" required></p>
 <p>Gênero:
 <select name="genero_id" required>
 <option value="">Selecione...</option>
 <?php foreach ($generos as $g): ?>
 <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['nome']) ?></option>
 <?php endforeach; ?>
 </select>
 </p>
 <button type="submit">Salvar</button>
</form>