<?php

session_start();

require "banco.php";

$exibir_tabela = false;

if (array_key_exists('placa', $_GET) && $_GET['placa'] != '') {
    $veiculo = [
        'id' => $_GET['id'],
        'placa' => '',
        'marca' => '',
        'modelo' => '',
        'hora_entrada' => $_GET['hora_entrada'],
        'hora_saida' => $_GET['hora_saida']        
    ];

    if (array_key_exists('placa', $_GET)) {
        $veiculo['placa'] = $_GET['placa'];
    }

    if (array_key_exists('marca', $_GET)) {
        $veiculo['marca'] = $_GET['marca'];
    }

    if (array_key_exists('modelo', $_GET)) {
        $veiculo['modelo'] = $_GET['modelo'];
    }

    editar_veiculo($conexao, $veiculo);
    header('Location: veiculos.php');
    die();
}

$veiculo = buscar_veiculo($conexao, $_GET['id']);

require "template.php";