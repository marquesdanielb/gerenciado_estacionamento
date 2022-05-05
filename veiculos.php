<?php

session_start();

require "banco.php";

if (array_key_exists('placa', $_GET) && $_GET['placa'] != '') {
    $veiculo = [];

    $veiculo['placa'] = $_GET['placa'];

    if (array_key_exists('marca', $_GET)) {
        $veiculo['marca'] = $_GET['marca'];
    }else{
        $veiculo['marca'] = null;
    }

    if (array_key_exists('modelo', $_GET)) {
        $veiculo['modelo'] = $_GET['modelo'];
    }else{
        $veiculo['modelo'] = null;
    }

    if (array_key_exists('hora_entrada', $_GET)) {
        $veiculo['hora_entrada'] = $_GET['hora_entrada'];
    }else{
        $veiculo['hora_entrada'] = null;
    }
    
    if (array_key_exists('hora_saida', $_GET)) {
        $veiculo['hora_saida'] = $_GET['hora_saida'];
    }else{
        $veiculo['hora_saida'] = null;
    }

    gravar_veiculo($conexao, $veiculo);
}

$lista_veiculos = listar_veiculos($conexao);

require "template.php";