<?php

namespace Estacionamento\Models;

class RepositorioAnexos
{
    public function __construct(
        private \PDO $pdo
    ) {}

    public function buscar_anexos(int $veiculo_id)
    {
        $sql = "SELECT * FROM anexos WHERE veiculo_id = :veiculo_id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'veiculo_id' => $veiculo_id,
        ]);

        $anexos = [];
        
        while ($anexo = $query->fetchObject('Estacionamento\Models\Anexo')) {
            $anexos[] = $anexo;
        }

        return $anexos;
    }

    public function buscar_anexo(int $id)
    {
        $sql = "SELECT * FROM anexos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);

        $anexo = $query->fetchObject('Estacionamento\Models\Anexo');

        if (!is_object($anexo)) {
            throw new \Exception("O anexo com o número {$id} não existe.");
        }

        return $anexo;
    }

    public function gravar_anexo(Anexo $anexo)
    {
        $sql = "INSERT INTO anexos
                    (veiculo_id, nome, arquivo)
                VALUES
                    (:veiculo_id, :nome, :arquivo)";

        $query = $this->pdo->prepare($sql);
        $query->execute([
            'veiculo_id' => $anexo->getVeiculo_id(),
            'nome' => $anexo->getNome(),
            'arquivo' => $anexo->getArquivo(),
        ]);
    }

    public function remover_anexo(int $id)
    {
        $sql = "DELETE FROM anexos WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }
}