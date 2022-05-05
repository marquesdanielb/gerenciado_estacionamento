<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de estacionamento</title>
</head>
<body>
    <h1>Gerenciador de estacionamento</h1>
    <form>
        <fieldset>
            <label>
                Placa:
                <input type="text" name="placa">                
            </label>
            <label>
                Marca:
                <input type="text" name="marca">                
            </label>
            <label>
                Modelo:
                <input type="text" name="modelo">                
            </label>
            <label>
                Hora da entrada:
                <input type="time" name="hora_entrada">                
            </label>
            <label>
                Hora da saída:
                <input type="time" name="hora_saida">                
            </label>
            <input type="submit" value="cadastrar">
        </fieldset>
    </form>
    <table>
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Hora da entrada</th>
            <th>Hora da saída</th>
        </tr>
            <?php foreach($lista_veiculos as $veiculo) : ?>
                <tr>
                    <td><?php echo $veiculo['placa'];?></td>
                    <td><?php echo $veiculo['marca'];?></td>
                    <td><?php echo $veiculo['modelo'];?></td>
                    <td><?php echo $veiculo['hora_entrada'];?></td>
                    <td><?php echo $veiculo['hora_saida'];?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>