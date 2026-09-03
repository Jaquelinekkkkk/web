    <?php
require "conexao.php";

$erros = [];

$titulo = trim($_POST["titulo"] ?? "");

if ($titulo === "") $erros[] = "O título é obrigatório.";
elseif (mb_strlen($titulo) < 2) $erros[] = "Título muito curto.";

    # o mb_strlen obtem/armazena o comprmento da string que no caso é titulo

$autor = trim($_POST["autor"] ?? "");
if ($autor === "") $erros[] = "O autor é obrigatório.";

$ano = $_POST["ano"] ?? "";
if (!ctype_digit((string)$ano))
 $erros[] = "O ano deve conter apenas números.";
elseif ((int)$ano < 11 || (int)$ano > (int)date("Y"))
 $erros[] = "Ano fora do intervalo permitido.";

$genero_id = filter_input(INPUT_POST, "genero_id", FILTER_VALIDATE_INT);
if (!$genero_id) $erros[] = "Escolha um gênero.";
if ($erros) {
foreach ($erros as $e) echo htmlspecialchars($e) . "<br>";
exit;
}