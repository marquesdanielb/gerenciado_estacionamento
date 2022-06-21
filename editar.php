<?php

session_start();

require "banco.php";
require "ajudantes.php";

$exibir_tabela = false;

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    $veiculo = [
        'id' => $_POST['id'],
        'placa' => '',
        'marca' => '',
        'modelo' => '',
        'hora_entrada' => $_POST['hora_entrada'],
        'hora_saida' => $_POST['hora_saida']        
    ];

    if (array_key_exists('placa', $_POST) && $_POST['placa'] != '') {
        if (valida_placa($_POST['placa'])) {
            $veiculo['placa'] = $_POST['placa'];
        }else {
            $tem_erros = true;
            $erros_validacao['placa'] = 'O formato da placa deverá ser informado no padrão XXX-XXXX';
        }
    }elseif ($_POST['placa'] == '') {
            $tem_erros = true;
            $erros_validacao['placa'] = 'A placa é uma informação obrigatória'; 
    }

    if (array_key_exists('marca', $_POST)) {
        $veiculo['marca'] = $_POST['marca'];
    }

    if (array_key_exists('modelo', $_POST)) {
        $veiculo['modelo'] = $_POST['modelo'];
    }

    if (!$tem_erros) {
        editar_veiculo($conexao, $veiculo);
        header('Location: veiculos.php');
        die();
    }
}

$veiculo = buscar_veiculo($conexao, $_GET['id']);

$veiculo['placa'] = (array_key_exists('placa', $_POST)) ? $_POST['placa'] : $veiculo['placa'];
$veiculo['marca'] = (array_key_exists('marca', $_POST)) ? $_POST['marca'] : $veiculo['marca'];
$veiculo['modelo'] = (array_key_exists('modelo', $_POST)) ? $_POST['modelo'] : $veiculo['modelo'];

require "template.php";