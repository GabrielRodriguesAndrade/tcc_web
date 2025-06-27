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

    public function select(int $id_evento)//passar int id_evento
    {
        $sql = "SELECT DATE_FORMAT(entrada, '%H:00') AS hora, SUM(valor) AS total FROM pagamento WHERE id_evento = ? GROUP BY hora ORDER BY hora";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_evento);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectPorEvento(EventoModel $model)//$model contem array com os dados de todos os eventos que pertecem a empresa
    {
        $resultado = [];//criando array para formatar os dados do jeito desejado

        foreach($model->rows as $m)//acessando os eventos dentro da array
        {
            $sql = "SELECT SUM(valor) AS total FROM pagamento WHERE id_evento = ?";//selecionando o valor total arrecadado pelo evento selecionado

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $m->id_evento);

            $stmt->execute();

            $total = $stmt->fetchColumn();

            //organizando a array da forma que quiser
            $resultado[] =
            [
                'nome' => $m->nome,
                'total' => $total ? $total : 0
            ];
        }

        return $resultado;//retornando a array com o nome do evento e o total arrecadado
    }

    public function selectPorMes(array $model)
    {
        $resultado = [];

        foreach ($model as $m)
        {
            $sql = "SELECT DATE_FORMAT(entrada, '%M') AS mes, SUM(valor) AS total 
                    FROM pagamento 
                    WHERE id_evento = ?
                    GROUP BY mes
                    ORDER BY STR_TO_DATE(mes, '%M')";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $m->id_evento);
            $stmt->execute();

            $pagamento = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($pagamento as $p)
            {
                $resultado[] = [
                    'mes' => $p['mes'], // Corrigido: array associativo
                    'total' => $p['total'] ? $p['total'] : 0 // Corrigido: pegar do array
                ];
            }
        }

        return $resultado;
    }


}
