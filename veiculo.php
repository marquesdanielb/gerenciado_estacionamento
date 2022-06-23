<?php

require "banco.php";
require "ajudantes.php";

$veiculo = buscar_veiculo($conexao, $_GET['id']);

if (!is_array($veiculo)) {
    http_response_code(404);
    echo 'Veículo não cadastrado';
    die();
}

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    
    $veiculo_id = $_POST['veiculo_id'];

    if (array_key_exists('anexo', $_FILES) && $_FILES['anexo']['name'] == '') {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você não selecionou nenhum arquivo';
    }else {
        if (tratar_anexo($_FILES['anexo'])) {
            $nome = $_FILES['anexo']['name'];
            $anexo = [
                'veiculo_id' => $veiculo_id,
                'nome' => substr($nome, 0, -4),
                'arquivo' => $nome
            ];
        }else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Você não poderá guardar esse formato de arquivo. Somente .jpg ou jpeg.';
        }
    }

    // if (!$tem_erros) {
    //     gravar_anexo($conexao, $anexo);
    //     header('Location: veiculo.php?id='.$veiculo_id);
    //     die();
    // }
}

$anexos = buscar_anexos($conexao, $_GET['id']);

require "template_veiculo.php";