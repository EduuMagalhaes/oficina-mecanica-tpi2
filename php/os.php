<?php
require_once "functions.php";

$erros = [];

if (!isset($_POST["veiculo"]) || strlen($_POST["veiculo"]) < 3) {
    $erros[] = "Informe um veículo válido.";
}
if (!isset($_POST["mecanico"]) || strlen($_POST["mecanico"]) < 3) {
    $erros[] = "Informe um mecânico válido.";
}
if (!isset($_POST["entrada"]) || !$_POST["entrada"]) {
    $erros[] = "Informe uma data de entrada válida.";
}
if (!isset($_POST["previsao"]) || !$_POST["previsao"]) {
    $erros[] = "Informe uma previsão de entrega válida.";
}

if (!isset($_POST["defeito"]) || strlen($_POST["defeito"]) < 5) {
    $erros[] = "Informe um defeito válido.";
}
if (!isset($_POST["status"]) || !in_array($_POST["status"], ["Aberta", "Em andamento", "Aguardando peça", "Concluída"])) {
    $erros[] = "Informe um status válido.";
}

if ($erros) {
    responderJSON(false, implode(" ", $erros));
}

$objetoOS = [
    "veiculo" => $_POST["veiculo"],
    "mecanico" => $_POST["mecanico"],
    "entrada" => $_POST["entrada"],
    "previsao" => $_POST["previsao"],
    "defeito" => $_POST["defeito"],
    "status" => $_POST["status"]
];

if (existeNoBanco("os", $objetoOS)) {
    responderJSON(false, "Já existe uma OS aberta para este veículo.");
}

responderJSON(true, "OS aberta com sucesso.");

?>