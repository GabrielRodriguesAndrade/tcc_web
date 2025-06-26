<?php

class FuncionarioDAO
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

    public function select(int $id_funcionario)
    {
        $sql = "SELECT obs FROM obs_funcionario WHERE id_funcionario = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_funcionario);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}