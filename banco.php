<?php

$hostname = '127.0.0.1';
$username = 'estacionamentoadmin';
$password = 'root';
$database = 'estacionamento';

$conexao = mysqli_connect($hostname, $username, $password, $database);

function listar_veiculos($conexao)
{
    $sqlQuery = "SELECT * FROM veiculos";

    $resultado = mysqli_query($conexao, $sqlQuery);

    $veiculos = [];

    while ($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }

    return $veiculos;
}

function gravar_veiculo($conexao, $veiculo)
{
    $sqlQuery = "INSERT INTO veiculos
                (placa, marca, modelo, hora_entrada, hora_saida)
                VALUES
                (
                    '{$veiculo['placa']}',
                    '{$veiculo['marca']}',
                    '{$veiculo['modelo']}',
                    '{$veiculo['hora_entrada']}',
                    '{$veiculo['hora_saida']}'
                )
            ";
    mysqli_query($conexao, $sqlQuery);
}