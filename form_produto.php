<?php
// Inicializa variáveis para não dar erro de "Undefined variable" no primeiro acesso
$erros = [];
$valores = ['nome' => '', 'preco' => '', 'estoque' => '', 'email' => ''];

// Se a página receber dados via sessão (vindo do salvar.php após um erro)
session_start();
if (isset($_SESSION['erros'])) {
    $erros = $_SESSION['erros'];
    $valores = $_SESSION['valores'];
    unset($_SESSION['erros']);
    unset($_SESSION['valores']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h2>Cadastrar Produto</h2>

    <form method="post" action="salvar.php">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($valores['nome'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <?php if (isset($erros['nome'])) { echo "<span style='color:red;'>".$erros['nome']."</span><br>"; } ?>
        <br>

        <label>E-mail do Fornecedor:</label><br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($valores['email'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <?php if (isset($erros['email'])) { echo "<span style='color:red;'>".$erros['email']."</span><br>"; } ?>
        <br>

        <label>Preço:</label><br>
        <input type="text" name="preco" value="<?php echo htmlspecialchars($valores['preco'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <?php if (isset($erros['preco'])) { echo "<span style='color:red;'>".$erros['preco']."</span><br>"; } ?>
        <br>

        <label>Estoque:</label><br>
        <input type="number" name="estoque" value="<?php echo htmlspecialchars($valores['estoque'], ENT_QUOTES, 'UTF-8'); ?>"><br>
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
