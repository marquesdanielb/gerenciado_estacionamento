<?php

namespace Estacionamento\Models;

class RepositorioVeiculos
{
    public function __construct(
        private \PDO $pdo
    ) {}

    public function buscar(int $veiculo_id = 0)
    {
        if ($veiculo_id > 0) {
           return $this->buscar_veiculo($veiculo_id);
        } else {
            return $this->buscar_veiculos();
        }
    }

    public function buscar_veiculos()
    {
        $sql = "SELECT * FROM veiculos";
        $query = $this->pdo->query($sql, \PDO::FETCH_CLASS, 'Estacionamento\Models\Veiculo');

        $veiculos = [];

        while ($veiculo = $query->fetchObject('Estacionamento\Models\Veiculo')) {
            $veiculos[] = $veiculo;
        }

        return $veiculos;
    }

    public function buscar_veiculo(int $id)
    {
        $sql = "SELECT * FROM veiculos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);

        $veiculo = $query->fetchObject('Estacionamento\Models\Veiculo');

        if (!is_object($veiculo)) {
            throw new \Exception("O veiculo de id {$id} não existe.");
        }

        return $veiculo;
    }

    public function gravar_veiculo(Veiculo $veiculo)
    {
        $hora_entrada = $veiculo->getHora_entrada();
        $hora_saida = $veiculo->getHora_saida();

        if (is_object($hora_entrada) && is_object($hora_saida)) {
            $hora_entrada = $hora_entrada->format("Y-m-d H:i:s");
            $hora_saida = $hora_saida->format("Y-m-d H:i:s");
        }

        $sql = "INSERT INTO veiculos
                    (placa, marca, modelo, hora_entrada, hora_saida)
                VALUES
                    (:placa, :marca, :modelo, :hora_entrada, :hora_saida)";

        $query = $this->pdo->prepare($sql);
        $query->execute([
            'placa' => strip_tags($veiculo->getPlaca()),
            'marca' => strip_tags($veiculo->getMarca()),
            'modelo' => strip_tags($veiculo->getModelo()),
            'hora_entrada' => $hora_entrada,
            'hora_saida' => $hora_saida,
        ]);
    }
    
    public function atualizar_veiculo(Veiculo $veiculo)
    {
        $hora_entrada = $veiculo->getHora_entrada();
        $hora_saida = $veiculo->getHora_saida();

        if (is_object($hora_entrada) && is_object($hora_saida)) {
            $hora_entrada = $hora_entrada->format("Y-m-d H:i:s");
            $hora_saida = $hora_saida->format("Y-m-d H:i:s");
        }

        $sql = "UPDATE veiculos SET
                    placa = :placa,
                    marca = :marca,
                    modelo = :modelo,
                    hora_entrada = :hora_entrada,
                    hora_saida = :hora_saida
                WHERE id = :id";

        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $veiculo->getId(),
            'placa' => $veiculo->getPlaca(),
            'marca' => $veiculo->getMarca(),
            'modelo' => $veiculo->getModelo(),
            'hora_entrada' => $veiculo->getHora_entrada(),
            'hora_saida' => $veiculo->getHora_saida(),
        ]);
    }

    public function remover_veiculo(int $id)
    {
        $sql = "DELETE FROM veiculos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }
}