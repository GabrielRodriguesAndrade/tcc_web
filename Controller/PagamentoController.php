<?php
//preciso de uma lista de id_evento que pertence a empresa para poder pegar todos os pagamentos
class PagamentoController
{
    public static function index()
    {
        echo "oi";
        $model = new PagamentoModel();
        $dados = [];
        $dados = $model->getAllRows(1);

        include "View/modules/Pagamento/PagamentoGraficoColum.php";
    }

    public static function form()
    {
        include "View/modules/Pagamento/FormPagamento.php";
    }

}