<?php

class CarroDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=108.179.192.66;port=3306;dbname=gab34505_tcc";

        try {
            $this->conexao = new PDO($dsn, 'gab34505_admin', 'mQQu8phZUzA5');
            
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro na conexão: ' . $e->getMessage();
        }
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
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}