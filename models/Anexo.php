<?php

namespace Estacionamento\Models;

class Anexo
{
    private $id = 0;
    private $veiculo_id = 0;
    private $nome = '';
    private $arquivo = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function getVeiculo_id(): int
    {
        return $this->veiculo_id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getArquivo(): string
    {
        return $this->arquivo;
    }

    public function setVeiculo_id(int $veiculo_id)
    {
        $this->veiculo_id = $veiculo_id;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setArquivo(string $arquivo)
    {
        $this->arquivo = $arquivo;
    }
}