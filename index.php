<?php

use Estacionamento\Models\RepositorioVeiculos;

require "vendor/autoload.php";
require "config.php";
require "helpers/banco.php";
require "helpers/ajudantes.php";

$repositorio_veiculos = new RepositorioVeiculos($pdo);

$rota = "estacionamento";

if (array_key_exists('rota', $_GET)) {
    $rota = $_GET['rota'];
}

if (is_file("controllers/{$rota}.php")) {
    require "controllers/{$rota}.php";
} else {
    echo "Rota não encontrada.";
}
