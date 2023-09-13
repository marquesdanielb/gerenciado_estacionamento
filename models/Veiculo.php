<?php

namespace Estacionamento\Models;

class Veiculo
{
    private $id = 0;
    private $placa = '';
    private $marca = '';
    private $modelo = '';
    private $hora_entrada = null;
    private $hora_saida = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPlaca(): string
    {
        return $this->placa;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getHora_entrada(): \DateTime|null
    {
        if (is_string($this->hora_entrada) && !empty($this->hora_entrada)) {
            $this->hora_entrada = \DateTime::createFromFormat("Y-m-d H:i:s", $this->hora_entrada);
        } else {
            $this->hora_entrada = null;
        }

        return $this->hora_entrada;
    }

    public function getHora_saida(): \DateTime|null
    {
        if (is_string($this->hora_saida) && !empty($this->hora_saida)) {
            $this->hora_saida = \DateTime::createFromFormat("Y-m-d H:i:s", $this->hora_saida);
        } else {
            $this->hora_saida = null;
        }
        
        return $this->hora_saida;
    }

    public function setPlaca(string $placa)
    {
        $this->placa = $placa;
    }

    public function setMarca(string $marca)
    {
        $this->marca = $marca;
    }

    public function setModelo(string $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setHora_entrada(string $hora_entrada)
    {
        $this->hora_entrada = $hora_entrada;
    }

    public function setHora_saida(string $hora_saida)
    {
        $this->hora_saida = $hora_saida;
    }
}