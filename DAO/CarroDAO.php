<?php

class CarroDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Database::connection();
    }

    public function select(int $id_estacionamento)
    {
        $sql = "SELECT * FROM carro WHERE id_estacionamento = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_estacionamento);

        $stmt->execute();
        $carrosObj = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $carros = [];

        foreach($carrosObj as $carroObj)
        {
            $carro = new CarroModel();

            $carro->id_carro = $carroObj['id_carro'];
            $carro->telefone = $carroObj['telefone'];
            $carro->placa = $carroObj['placa'];
            $carro->modelo = $carroObj['modelo'];
            $carro->vaga = $carroObj['vaga'];
            $carro->estacionado = $carroObj['estacionado'];
            $carro->id_estacionamento = $carroObj['id_estacionamento'];
            $carro->obs = $this->getobs($carro->id_carro);

            $carros[] = $carro;
        }

        return $carros;
    }

    public function getobs(int $id_carro)
    {
        $sql = "SELECT obs FROM obs_carro WHERE id_carro = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_carro);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
