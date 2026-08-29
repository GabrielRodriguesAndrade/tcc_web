<?php

class FuncionarioDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Database::connection();
    }

    public function select(int $id_empresa)
    {
        $sql = "SELECT * FROM funcionario WHERE id_empresa = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id_empresa);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getObs(int $id_funcionario)
    {
        $sql = "SELECT obs FROM obs_funcionario WHERE id_funcionario = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_funcionario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(FuncionarioModel $model)
    {
        $sql = "INSERT INTO funcionario (email, cpf, senha, sal) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$model->email);
        $stmt->bindValue(2,$model->cpf);
        $stmt->bindValue(3,$model->senha);
        $stmt->bindValue(4,$model->sal);

        $stmt->execute();
    }

    public function delete(int $id_funcionario)
    {
        $sql = "DELETE FROM funcionario WHERE id_funcionario = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id_funcionario);

        $stmt->execute();
    }
}
