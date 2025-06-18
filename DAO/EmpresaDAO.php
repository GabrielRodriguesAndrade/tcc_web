<?php

class EmpresaDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=108.179.192.66;port=3306;dbname=gab34505_tcc";

        try {
            $this->conexao = new PDO($dsn, 'gab34505_admin', 'mQQu8phZUzA5;charset=utf8');
            
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro na conexão: ' . $e->getMessage();
        }
    }

    public function insert(EmpresaModel $model)
    {
        $sql = "INSERT INTO empresa (nome, email, cnpj, senha) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->cnpj);
        $stmt->bindValue(4, $model->senha);

        $stmt->execute();
    }

    public function update()
    {

    }

    public function select()
    {

    }
}