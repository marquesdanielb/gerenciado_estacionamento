<?php

try {
    $veiculo = $repositorio_veiculos->buscar($_GET['id']);
} catch (\Exception $e) {
    echo "O veículo de número {$_GET['id']} não existe." . $e->getMessage();
}

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    if (strlen($_POST['placa']) > 0) {
        if (validar_placa($_POST['placa'])) {
            $veiculo->setPlaca($_POST['placa']);
        } else {
            $tem_erros = true;
            $erros_validacao['placa'] = 'O formato da placa informado não é válido';
        }
    }

    if (isset($_POST['marca']) || $_POST['marca'] == '') {
        $veiculo->setMarca($_POST['marca']);
    }
    
    if (isset($_POST['modelo']) || $_POST['modelo'] == '') {
        $veiculo->setModelo($_POST['modelo']);
    }

    if (array_key_exists('hora_entrada', $_POST)  && $veiculo->getHora_entrada() !== '') {
        if (validar_data($_POST['hora_entrada'])) {
            $veiculo->setHora_entrada(traduz_hora_banco($_POST['hora_entrada']));
        } else {
            $tem_erros = true;
            $erros_validacao['hora_entrada'] = 'A hora de entrada não está no formato correto!';
        }
    }

    if (array_key_exists('hora_saida', $_POST)  && $veiculo->getHora_saida() !== '') {
        if (validar_data($_POST['hora_saida'])) {
            $veiculo->setHora_saida(traduz_hora_banco($_POST['hora_saida']));
        } else {
            $tem_erros = true;
            $erros_validacao['hora_saida'] = 'A hora de saida não está no formato correto!';
        }
    }

    if (!$tem_erros) {
        $repositorio_veiculos->atualizar_veiculo($veiculo);
        header('Location: index.php?rota=estacionamento');
        die();
    }
}

require __DIR__ . "/../views/template.php";

