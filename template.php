<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de estacionamento</title>
</head>
<body>
    <h1>Gerenciador de estacionamento</h1>

    <?php require('formulario.php'); ?>
    <?php if($exibir_tabela) : ?>
        <?php require('tabela.php'); ?>
    <?php endif; ?>
</body>
</html>