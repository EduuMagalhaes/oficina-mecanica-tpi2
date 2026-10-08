<?php
require_once "functions.php";

$erros = [];

if (!isset($_POST["nome"]) || strlen($_POST["nome"]) < 3) {
    $erros[] = "Informe um nome válido.";
}
if (!isset($_POST["especialidade"]) || strlen($_POST["especialidade"]) < 2) {
    $erros[] = "Informe uma especialidade válida.";
}
if (!isset($_POST["telefone"]) || !validarTelefone($_POST["telefone"])) {
    $erros[] = "Informe um telefone válido.";
}
if (!isset($_POST["admissao"]) || !validarDataNaoFutura($_POST["admissao"])) {
    $erros[] = "Informe uma data de admissão válida.";
}
if (!isset($_POST["valor_hora"]) || !validarNumeroNaoNegativo($_POST["valor_hora"])) {
    $erros[] = "informe um valor por hora válido.";
}

if ($erros) {
    responderJSON(false, implode(" ", $erros));
}

$objetoMecanico = [
    "nome" => $_POST["nome"],
    "especialidade" => $_POST["especialidade"],
    "telefone" => $_POST["telefone"],
    "admissao" => $_POST["admissao"],
    "valor_hora" => $_POST["valor_hora"]
];

if (existeNoBanco("mecanico", $objetoMecanico)) {
    responderJSON(false, "Já existe um mecânico com este nome.");
}

responderJSON(true, "Mecânico cadastrado com sucesso.");

?>