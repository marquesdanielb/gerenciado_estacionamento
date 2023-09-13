<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/estilo.css">
    <title>Anexos</title>
</head>
<body>
    <div id='bloco_principal'>
        <h1>Placa:<?php echo htmlentities($veiculo->getPlaca()); ?></h1>
        <p>
            <a href="index.php?rota=estacionamento">
                Voltar para a lista de veículos.
            </a>
        </p>
        <p>
            <strong>Marca:</strong>
            <?php echo htmlentities($veiculo->getMarca()); ?>
        </p>
        <p>
            <strong>Modelo:</strong>
            <?php echo htmlentities($veiculo->getModelo()); ?>
        </p>
        <p>
            <strong>Hora de entrada:</strong>
            <?php echo traduz_hora_exibir($veiculo->getHora_entrada()); ?>
        </p>
        <p>
            <strong>Hora de saída:</strong>
            <?php echo traduz_hora_exibir($veiculo->getHora_saida()); ?>
        </p>

        <h2>Anexos</h2>
        <?php if (count($anexos) > 0) : ?>
            <table>
                <tr>
                    <th>Arquivo</th>
                    <th>Opções</th>
                </tr>
                <?php foreach ($anexos as $anexo) : ?>
                <tr>
                    <td>
                        <?php echo $anexo->getNome(); ?>
                    </td>
                    <td>
                        <a href="anexos/<?php echo htmlentities($anexo->getArquivo()); ?>">Download</a>
                        <a href="index.php?rota=remover_anexo&id=<?php echo $anexo->getId(); ?>">Remover</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
                <p>Não há anexos para esta tarefa.</p>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="veiculo_id" value="<?php echo $veiculo->getId(); ?>">
                <fieldset>
                    <legend>Novo Anexo</legend>
                    <label>
                        <?php if ($tem_erros && array_key_exists('anexo', $erros_validacao)) : ?>
                            <span class="erro">
                                <?php echo $erros_validacao['anexo']; ?>
                            </span>
                        <?php endif; ?>
                        <input type="file" name="anexo">
                    </label>
                    <input type="submit" value="Cadastrar">
                </fieldset>
            </form>
    </div>
</body>
</html>