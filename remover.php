<?php

session_start();

require "banco.php";

remover_veiculo($conexao, $_GET['id']);

header('Location: veiculos.php');
die();