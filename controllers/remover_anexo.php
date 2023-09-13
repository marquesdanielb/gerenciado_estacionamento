<?php

$repositorio_anexos = new Estacionamento\Models\RepositorioAnexos($pdo);

try {
    $anexo = $repositorio_anexos->buscar_anexo($_GET['id']);
} catch (Exception $e) {
    echo "O anexo de número {$_GET['id']} não existe." . $e->getMessage();
}

if ($anexo->getId() == $_GET['id']) {
    $repositorio_anexos->remover_anexo($anexo->getId());
    unlink(__DIR__ . '/../anexos/' . $anexo->getArquivo());
}

header('Location: index.php?rota=veiculo&id=' . $anexo->getVeiculo_id());
