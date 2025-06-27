<?php 

class PagamentoModel
{
    public $valor, $entrada, $saida, $id_evento, $id_carro;

    public $rows;
    
    public function getAllRows(int $id_evento)
    {
        $dao = new PagamentoDAO();

        $this->rows = $dao->select($id_evento);
        return $this->rows;
    }

    public function getRowsEventos(EventoModel $model)
    {
        $dao = new PagamentoDAO();

        $this->rows = $dao->selectPorEvento($model);
        return $this->rows;
    }

    public function getRowsMes(array $model)
    {
        $dao = new PagamentoDAO();

        $this->rows = $dao->selectPorMes($model);
        return $this->rows;
    }

    public function somarPorMes(array $dados)//função para somar a arrecadacão total por mes depois de descobrir o mes de cada pagamento
    {
        $consolidado = [];//array para criar os meses de arrecadação e associar ao valor total

        foreach ($dados as $item) 
        {
            $mes = $item['mes'];

            if (!isset($consolidado[$mes]))//verifica se o mes ja foi criado na array 
            {
                $consolidado[$mes] = 0;//se nao ele cria e inicia em 0
            }

            $consolidado[$mes] += $item['total'];//soma o valor 
        }


        $resultado = [];//array para retornar no formato desejado para o grafico

        foreach ($consolidado as $mes => $total) //pegando o mes e o valor associado a ele
        {
            $resultado[] = ['mes' => $mes, 'total' => $total];//formatando a array da maneira que quiser
        }

        return $resultado;
    }

}