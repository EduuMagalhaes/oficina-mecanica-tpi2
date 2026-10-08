<?php
require_once "functions.php";

$erros = [];

if (!isset($_POST["placa"]) || !validarPlaca($_POST["placa"])) {
    $erros[] = "Informe uma placa válida.";
}
if (!isset($_POST["marca"]) || strlen($_POST["marca"]) < 2) {
    $erros[] = "Informe uma marca válida.";
}
if (!isset($_POST["modelo"]) || strlen($_POST["modelo"]) < 2) {
    $erros[] = "Informe um modelo válido.";
}
if (!isset($_POST["ano"]) || !validarAnoVeiculo($_POST["ano"])) {
    $erros[] = "Informe um ano válido.";
}
if (!isset($_POST["quilometragem"]) || !validarNumeroNaoNegativo($_POST["quilometragem"])) {
    $erros[] = "Informe uma quilometragem válida.";
}
if (!isset($_POST["cliente"]) || strlen($_POST["cliente"]) < 3) {
    $erros[] = "Informe um cliente válido.";
}

if ($erros) {
    responderJSON(false, implode(" ", $erros));
}

$objetoVeiculo = [
    "placa" => $_POST["placa"],
    "marca" => $_POST["marca"],
    "modelo" => $_POST["modelo"],
    "ano" => $_POST["ano"],
    "quilometragem" => $_POST["quilometragem"],
    "cliente" => $_POST["cliente"]
];

if (existeNoBanco("veiculo", $objetoVeiculo)) {
    responderJSON(false, "Já existe um veículo com esta placa.");
}

responderJSON(true, "Veículo cadastrado com sucesso.");

?>