<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de estacionamento</title>
</head>
<body>
    <div="bloco_principal">
    <h1>Placa: <?php echo $veiculo['placa']; ?></h1>

    <p>
        <a href="veiculos.php">Voltar para a página inicial</a>
    </p>

    <p>
        <strong>Marca:</strong>
        <?php echo $veiculo['marca']; ?>
    </p>

    <p>
        <strong>Modelo:</strong>
        <?php echo $veiculo['modelo']; ?>
    </p>

    <p>
        <strong>Hora da entrada:</strong>
        <?php echo $veiculo['hora_entrada']; ?>
    </p>

    <p>
        <strong>Hora da saída:</strong>
        <?php echo $veiculo['hora_saida']; ?>
    </p>

    <h2>Anexos</h2>
    <?php if(count($anexos) > 0) : ?>
        <table>
            <tr>
                <th>Arquivo</th>
                <th>Opções</th>
            </tr>
            <?php foreach($anexos as $anexo) : ?>
                <tr>
                    <td><?php echo $anexo['nome']; ?></td>
                    <td>
                        <a href="anexos/<?php echo $anexo['arquivo']; ?>">Download</a>
                        <a href="remover_anexo.php?id=<?php echo $anexo['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table> 
        <?php else : ?>
            <p>Não há anexos cadastrados.</p>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo Anexo:</legend>
                <input type="hidden" name="veiculo_id" value="<?php echo $veiculo['id']; ?>">
                <label>
                    <?php if($tem_erros && array_key_exists('anexo', $erros_validacao)) : ?>
                        <span class="erro">
                            <?php echo $erros_validacao['anexo']; ?>
                        </span>
                    <?php endif; ?>
                    <input type="file" name="anexo">
                </label>
                <input type="submit" value="anexar">
            </fieldset>
        </form>
    </div>
</body>
</html>