<?php


class EventoDAO
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

    public function select()
    {
        $sql = "SELECT * FROM evento";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);//retorna array de objetos
    }

    public function insert()
    {
        $sql = "INSERT INTO evento (nome, cidade, 'local', localizacao, valor, dataInicio, dataFim, pagamento, vagas, id_empresa) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cidade);
        $stmt->bindValue(3, $model->local);
        $stmt->bindValue(4, $model->localizacao);
        $stmt->bindValue(5, $model->valor);
        $stmt->bindValue(6, $model->dataInicio);
        $stmt->bindValue(7, $model->dataFim);
        $stmt->bindValue(8, $model->pagamento);
        $stmt->bindValue(9, $model->vagas);
        $stmt->bindValue(10, $model->id_empresa);

        $stmt->execute();
    }
}
