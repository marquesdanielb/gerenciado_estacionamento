<form method="POST">
    <input type="hidden" name="id" value="<?php echo $veiculo->getId(); ?>">
    <fieldset>
        <legend>Novo Veículo</legend>
        <label>
            Placa:
            <?php if ($tem_erros && array_key_exists('placa', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['placa']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="placa" value="<?php echo htmlentities($veiculo->getPlaca()); ?>">
        </label>
        <label>
            Marca:
            <input type="text" name="marca" value="<?php echo htmlentities($veiculo->getMarca()); ?>">
        </label>
        <label>
            Modelo:
            <input type="text" name="modelo" value="<?php echo htmlentities($veiculo->getModelo()); ?>">
        </label>
        <label>
            Hora de Entrada:
            <?php if ($tem_erros && array_key_exists('hora_entrada', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['hora_entrada']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="hora_entrada" value="<?php echo traduz_hora_exibir($veiculo->getHora_entrada()); ?>"/>
        </label>
        <label>
            Hora de Saída:
            <?php if ($tem_erros && array_key_exists('hora_saida', $erros_validacao)) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['hora_saida']; ?>
                </span>
            <?php endif; ?>
            <input type="text" name="hora_saida" value="<?php echo traduz_hora_exibir($veiculo->getHora_saida()); ?>"/>
        </label>
        <br>
        <input type="submit" value="<?php echo ($veiculo->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>">
    </fieldset>
</form>