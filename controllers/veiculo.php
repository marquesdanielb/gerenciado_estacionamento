<?php

$repositorio_anexos = new Estacionamento\Models\RepositorioAnexos($pdo);

try {
    $veiculo = $repositorio_veiculos->buscar_veiculo($_GET['id']);
} catch (Exception $e) {
    echo $e->getMessage();
}

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    $veiculo_id = $_POST['veiculo_id'];

    if (!array_key_exists('anexo', $_FILES)) {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar.';
    } else {
        if (tratar_anexo($_FILES['anexo'])) {
            $anexo = new Estacionamento\Models\Anexo();
            $nome = $_FILES['anexo']['name'];
            $anexo->setVeiculo_id($veiculo_id);
            $anexo->setNome(substr($nome, 0, -4));
            $anexo->setArquivo($nome);
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie anexos nos formatos .jpg ou png';
        }
    }

    if (!$tem_erros) {
        $repositorio_anexos->gravar_anexo($anexo);
        header('Location: index.php?rota=veiculo&id=' . $anexo->getVeiculo_id());
    }
}

$anexos = $repositorio_anexos->buscar_anexos($_GET['id']);

require __DIR__ . "/../views/template_veiculo.php";