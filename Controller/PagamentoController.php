<?php
//preciso de uma lista de id_evento que pertence a empresa para poder pegar todos os pagamentos
class PagamentoController
{
    public static function index()
    {
        include "Model/PagamentoModel.php";

        $model = new PagamentoModel();

        $model->getAllRows();
        include "View/modules/Pagamento/ListaPagamento.php";
    }

    public static function form()
    {
        include "View/modules/Pagamento/FormPagamento.php";
    }

}