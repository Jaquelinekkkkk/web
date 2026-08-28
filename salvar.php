<?php
require 'conexao.php';
require 'Produto.php';
require 'ProdutoDAO.php';

function validar(array $dados): array {
    $erros = [];
    
    $nome = trim($dados['nome'] ?? '');
    if ($nome == '') {
        $erros['nome'] = 'O nome é obrigatório.';
    } elseif (mb_strlen($nome) < 3) {
        $erros['nome'] = 'Mínimo de 3 letras.';
    }

    $email = trim($dados['email'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido.';
    }

    $preco = str_replace(',', '.', $dados['preco'] ?? '');
    if (!is_numeric($preco)) {
        $erros['preco'] = 'Preço deve ser numérico.';
    } elseif ((float)$preco <= 0) {
        $erros['preco'] = 'Preço deve ser maior que zero.';
    }

    return $erros;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erros = validar($_POST);

    if (count($erros) > 0) {
        session_start();
        $_SESSION['erros'] = $erros;
        $_SESSION['valores'] = $_POST;
        header('Location: form_produto.php');
        exit;
    }

    // Se a validação passar, trata o preço e grava com o DAO
    $precoTratado = (float)str_replace(',', '.', $_POST['preco']);
    $estoqueTratado = (int)$_POST['estoque'];
    
    $novoProduto = new Produto($_POST['nome'], $precoTratado, $estoqueTratado);
    
    $dao = new ProdutoDAO($pdo);
    $dao->inserir($novoProduto);

    header('Location: listar.php');
    exit;
}
