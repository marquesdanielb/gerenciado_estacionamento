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

function buscar_veiculo($conexao, $id)
{
    $sqlQuery = "SELECT * FROM veiculos WHERE id=".$id;
    $resultado = mysqli_query($conexao, $sqlQuery);

    return mysqli_fetch_assoc($resultado);
}

function editar_veiculo($conexao, $veiculo)
{
    $sqlQuery = "UPDATE veiculos SET
            placa = '{$veiculo['placa']}',
            marca = '{$veiculo['marca']}',
            modelo = '{$veiculo['modelo']}'
        WHERE id = {$veiculo['id']}
    ";

    mysqli_query($conexao, $sqlQuery);
}

function remover_veiculo($conexao, $id)
{
    $sqlQuery = "DELETE FROM veiculos WHERE id=".$id;

    mysqli_query($conexao, $sqlQuery);
}