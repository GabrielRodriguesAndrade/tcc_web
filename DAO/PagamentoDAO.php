<?php


class PagamentoDAO
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

    public function select()//passar int id_evento
    {
        $sql = "SELECT * FROM Pagamento WHERE id_evento = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_evento);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);//retorna array de objetos
    }

  
}
