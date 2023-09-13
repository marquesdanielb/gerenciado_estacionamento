<?php

try {
    $veiculo = $repositorio_veiculos->buscar($_GET['id']);
} catch (Exception $e) {
    echo "O veiculo de número {$_GET['id']} não existe." . $e->getMessage();
}

if ($veiculo->getId() == $_GET['id']) {
    $repositorio_veiculos->remover_veiculo($veiculo->getId());
}

header('Location: index.php?rota=estacionamento');
die();