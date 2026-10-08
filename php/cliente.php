<?php
require_once "functions.php";

$erros = [];

if (!isset($_POST["nome"]) || strlen($_POST["nome"]) < 3) {
    $erros[] = "Informe um nome válido.";
}
if (!isset($_POST["cpf"]) || !validarCPF($_POST["cpf"])) {
    $erros[] = "Informe um CPF válido.";
}
if (!isset($_POST["telefone"]) || !validarTelefone($_POST["telefone"])) {
    $erros[] = "Informe um telefone válido.";
}
if (!isset($_POST["email"]) || !validarEmail($_POST["email"])) {
    $erros[] = "Informe um e-mail válido.";
}
if (!isset($_POST["endereco"]) || strlen($_POST["endereco"]) < 5) {
    $erros[] = "Informe um endereço válido.";
}

if ($erros) {
    responderJSON(false, implode(" ", $erros));
}

$objetoCliente = [
    "nome" => $_POST["nome"],
    "cpf" => $_POST["cpf"],
    "telefone" => $_POST["telefone"],
    "email" => $_POST["email"],
    "endereco" => $_POST["endereco"]
];

// Lógica extra - checar se já existe
if (existeNoBanco("cliente", $objetoCliente)) {
    responderJSON(false, "Já existe um cliente com este CPF ou e-mail.");
}

responderJSON(true, "Cliente cadastrado com sucesso.");