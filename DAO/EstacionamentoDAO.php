<?php


class EstacionamentoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Database::connection();
    }

    public function select(int $id_evento)
    {
        $sql = "SELECT * FROM Estacionamento WHERE id_evento = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_evento);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(EstacionamentoModel $model)
    {
        $sql = "INSERT INTO estacionamento (vagas, vagasVip, vagasEspeciais, id_evento) VALUES (?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->vagas);
        $stmt->bindValue(2, $model->vagasVip);
        $stmt->bindValue(3, $model->vagasEspeciais);
        $stmt->bindValue(4, $model->id_evento);
        

        $stmt->execute();
    }

    public function update(EstacionamentoModel $model)
    {
        $sql = "UPDATE estacionamento SET vagas = ?, vagasVip = ?, vagasEspeciais = ? WHERE id_estacionamento = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->vagas);
        $stmt->bindValue(2, $model->vagasVip);
        $stmt->bindValue(3, $model->vagasEspeciais);
        $stmt->bindValue(4, $model->id_estacionamento);

        $stmt->execute();
    }

    public function delete(int $id_estacionamento)
    {
        $sql = "DELETE FROM estacionamento WHERE id_estacionamento = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_estacionamento);

        $stmt->execute();
    }
}
