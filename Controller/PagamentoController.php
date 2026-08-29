<?php
//preciso de uma lista de id_evento que pertence a empresa para poder pegar todos os pagamentos
class PagamentoController
{
    public static function index()
    {
        $model = new PagamentoModel();
        $dados = [];
        $dados = $model->getAllRows(1);

        include "View/modules/Pagamento/PagamentoGraficoColumn.php";
    }

    public static function indexEventos()
    {
      $eventos = new EventoModel();
      $eventos->id_empresa = 1;
      $eventos->getAllRows(1);

      $dados = [];

      $model = new PagamentoModel();
      $dados = $model->getRowsEventos($eventos);
      
      include "View/modules/Pagamento/PagamentoGraficoColumnEventos.php";
    }

    public static function indexMes()
    {
      $eventos = new EventoModel();
      $eventos->id_empresa = 1;
      $eventos->getAllRows(1);
      
      $model = new PagamentoModel();
      $model->getRowsMes($eventos->rows);
      
      $dados = $model->somarPorMes($model->rows);
      

      include "View/modules/Pagamento/PagamentoGraficoColumnMes.php";
    }


}
