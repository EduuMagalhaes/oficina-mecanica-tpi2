<?php
function validarCPF($cpf) {
    $cpf = preg_replace("/\D/", "", $cpf);
    return strlen($cpf) === 11;
}

function validarTelefone($telefone) {
    $telefone = preg_replace("/\D/", "", $telefone);
    return strlen($telefone) >= 10;
}

function validarEmail($email) {
    $regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    return preg_match($regex, $email);
}

function validarPlaca($placa) {
    $placa = strtoupper(preg_replace("/[^A-Z0-9]/", "", $placa));
    $regex = "/^[A-Z]{3}[0-9][A-Z0-9][0-9]{2}$/";
    return preg_match($regex, $placa);
}

function validarDataNaoFutura($data) {
    return $data <= date("Y-m-d");
}

function validarNumeroNaoNegativo($valor) {
    return is_numeric($valor) && $valor >= 0;
}

function validarAnoVeiculo($ano) {
    return is_numeric($ano) && $ano >= 1950 && $ano <= date("Y") + 1;
}

function responderJSON($sucesso, $mensagem) {
    header("Content-Type: application/json");
    echo json_encode(["sucesso" => $sucesso, "mensagem" => $mensagem]);
    exit;
}
?>