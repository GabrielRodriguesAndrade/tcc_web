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

    public function select(int $id_empresa)//ainda precisa passar parametro
    {
        $sql = "SELECT * FROM evento WHERE id_empresa = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_empresa);
        $stmt->execute();


        $eventos = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($eventos as $evento) 
        {
            $evento->funcionarios = $this->getFuncionarios($evento->id_evento);           
            $evento->candidatos = $this->getCandidatos($evento->id_evento);
        }

        return $eventos;
    }

    public function getFuncionarios(int $id_evento)
    {
        $sql = "SELECT f.* FROM funcionario_evento fe JOIN funcionario f ON f.id_funcionario = fe.id_funcionario WHERE fe.id_evento = ?";
         
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_evento);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCandidatos(int $id_evento)
    {
        $sql = "SELECT f.* FROM candidato_evento fe JOIN funcionario f ON f.id_funcionario = fe.id_funcionario WHERE fe.id_evento = ?";
         
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_evento);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
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

    public function update()
    {
        $sql = "UPDATE SET nome = ?, cidade = ?, 'local' = ?, localizacao = ?, valor = ?, dataInicio = ?, dataFim = ?, pagamento = ?, vagas = ? WHERE id_evento = ?";

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
        $stmt->bindValue(10, $model->id_evento);

        $stmt->execute();    
    }

    public function delete(int $id_evento)
    {
        $sql = "DELETE FROM evento WHERE id_evento = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $id_evento);

        $stmt->execute();
    }
}
