<?php

session_start();

require "banco.php";
require "ajudantes.php";

$exibir_tabela = true;

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    $veiculo = [
        'placa' => $_POST['placa'],
        'marca' => '',
        'modelo' => '',
        'hora_entrada' => '',
        'hora_saida' => '' 
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
    }else{
        $veiculo['marca'] = null;
    }

    if (array_key_exists('modelo', $_POST)) {
        $veiculo['modelo'] = $_POST['modelo'];
    }else{
        $veiculo['modelo'] = null;
    }

    if (array_key_exists('hora_entrada', $_POST)) {
        $veiculo['hora_entrada'] = $_POST['hora_entrada'];
    }else{
        $veiculo['hora_entrada'] = null;
    }
    
    if (array_key_exists('hora_saida', $_POST)) {
        $veiculo['hora_saida'] = $_POST['hora_saida'];
    }else{
        $veiculo['hora_saida'] = null;
    }

    if (!$tem_erros) {
        gravar_veiculo($conexao, $veiculo);
        header('Location: veiculos.php');
        die();
    }
}

$veiculo = [
    'id' => 0,
    'placa' => $_POST['placa'] ?? '',
    'marca' => $_POST['marca'] ?? '',
    'modelo' => $_POST['modelo'] ?? '',
    'hora_entrada' => $_POST['hora_entrada'] ?? '',
    'hora_saida' => $_POST['hora_saida'] ?? ''   
];

$lista_veiculos = listar_veiculos($conexao);

require "template.php";