<?php

function 
tem_post()
{
    return (count($_POST) > 0);
}

function valida_placa($placa)
{
    $padrao = "/^[A-Z0-9]{3}-[0-9]{4}$/";
    $resultado = preg_match($padrao, $placa);

    if ($resultado == 0) {
        return false;
    }

    return true;
}

function tratar_anexo($anexo)
{
    $padrao = "/^.+(\.jpg|\.jpeg)$/";
    $resultado = preg_match($padrao, $anexo['name']);

    if ($resultado == 0) {
        return false;
    }
    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");
       
    return true;
}