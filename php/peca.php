<?php
require_once "functions.php";

$erros = [];

if (!isset($_POST["nome"]) || strlen($_POST["nome"]) < 2) {
    $erros[] = "Informe um nome válido.";
}
if (!isset($_POST["codigo"]) || strlen($_POST["codigo"]) < 2) {
    $erros[] = "Informe um código válido.";
}
if (!isset($_POST["fornecedor"]) || strlen($_POST["fornecedor"]) < 2) {
    $erros[] = "Informe um fornecedor válido.";
}
if (!isset($_POST["preco_custo"]) || !validarNumeroNaoNegativo($_POST["preco_custo"])) {
    $erros[] = "Informe um preço de custo válido.";
}
if (!isset($_POST["preco_venda"]) || !validarNumeroNaoNegativo($_POST["preco_venda"])) {
    $erros[] = "Informe um preço de venda válido.";
}
if (!isset($_POST["estoque"]) || !validarNumeroNaoNegativo($_POST["estoque"])) {
    $erros[] = "Informe um estoque válido.";
}

if ($erros) {
    responderJSON(false, implode(" ", $erros));
}

$objetoPeca = [
    "nome" => $_POST["nome"],
    "codigo" => $_POST["codigo"],
    "fornecedor" => $_POST["fornecedor"],
    "preco_custo" => $_POST["preco_custo"],
    "preco_venda" => $_POST["preco_venda"],
    "estoque" => $_POST["estoque"]
];

if (existeNoBanco("peca", $objetoPeca)) {
    responderJSON(false, "Já existe uma peça com este código.");
}

responderJSON(true, "Peça cadastrada com sucesso.");