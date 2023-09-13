<?php

$exibir_tabela = true;
$tem_erros = false;
$erros_validacao = [];

$veiculo = new Estacionamento\Models\Veiculo();

if (tem_post()) {
    if (strlen($_POST['placa']) > 0) {
        if (validar_placa($_POST['placa'])) {
            $veiculo->setPlaca($_POST['placa']);
        } else {
            $tem_erros = true;
            $erros_validacao['placa'] = 'O formato da placa informado não é válido';
        }
    }

    if (!$_POST['marca'] == '') {
        $veiculo->setMarca($_POST['marca']);
    }
    
    if (!$_POST['modelo'] == '') {
        $veiculo->setModelo($_POST['marca']);
    }

    if (isset($_POST['hora_entrada']) && isset($_POST['hora_entrada'])) {
        if (validar_data($_POST['hora_entrada']) && validar_data($_POST['hora_saida'])) {
            $veiculo->setHora_entrada(traduz_hora_banco($_POST['hora_entrada']));
            $veiculo->setHora_saida(traduz_hora_banco($_POST['hora_saida']));
        } else {
            $tem_erros = true;
            $erros_validacao['hora_entrada'] = 'A hora de entrada não está no formato correto!';
            $erros_validacao['hora_saida'] = 'A hora de saida não está no formato correto!';
        }
    }

    if (!$tem_erros) {
        $repositorio_veiculos->gravar_veiculo($veiculo);
        header('Location: index.php?rota=estacionamento');
        die();
    }
}

$lista_veiculos = $repositorio_veiculos->buscar();

require __DIR__ . "/../views/template.php";
