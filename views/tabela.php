<table>
    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Hora de Entrada</th>
        <th>Hora de Saída</th>
        <th>Opções</th>
    </tr>
    <?php foreach ($lista_veiculos as $veiculo) : ?>
        <tr>
            <td>
                <a href="index.php?rota=veiculo&id=<?php echo $veiculo->getId(); ?>">
                    <?php echo $veiculo->getPlaca(); ?>
                </a>
            </td>
            <td><?php echo $veiculo->getMarca(); ?></td>
            <td><?php echo $veiculo->getModelo(); ?></td>
            <td><?php echo traduz_hora_exibir($veiculo->getHora_entrada()); ?></td>
            <td><?php echo traduz_hora_exibir($veiculo->getHora_saida()); ?></td>
            <td>
                <a href="index.php?rota=editar&id=<?php echo $veiculo->getId(); ?>">Editar</a>
                <a href="index.php?rota=remover&id=<?php echo $veiculo->getId(); ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>