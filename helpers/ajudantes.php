<?php

function traduz_hora_banco($hora)
{
    if ($hora == '') {
        return '';
    }

    $objeto_data = DateTime::createFromFormat('d/m/Y H:i:s', $hora);

    return $objeto_data->format('Y-m-d H:i:s');    
}

function traduz_hora_exibir($hora_banco)
{
    if ($hora_banco == '') {
        return '';
    }
    
    return $hora_banco->format('d/m/Y H:i:s');
}

function tem_post()
{
    return count($_POST) > 0;
}

function validar_placa($placa)
{
    $padrao = '/^[A-Z]{3}-[0-9]{4}$/';
    $resultado = preg_match($padrao, $placa);

    if ($resultado == 0) {
        return false;
    }

    return true;
}

function validar_data($data)
{
    $resultado = DateTime::createFromFormat('d/m/Y H:i:s', $data);

    if ($resultado == false) {
        return false;
    }

    return $resultado->format('d/m/Y H:i:s') == $data;
}

function tratar_anexo($anexo)
{
    $padrao = '/^.+(\.jpg|\.png)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    if ($resultado == 0) {
        return false;
    }

    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");

    return true;
}