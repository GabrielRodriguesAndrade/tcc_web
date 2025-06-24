<?php

class EventoController
{
    public static function index()//Responsável por devolver dados da empresa
    {

        $model = new EventoModel();

        $model->getAllRows();
        include "View/modules/Evento/ListaEvento.php";
    }

    public static function form()//Responsável por devolver formulario
    {
        include "View/modules/Evento/FormEvento.php";
    }

    public static function save()
    {

        $model = new EventoModel();

        $model->nome = $_POST['nome'];//preenchendo model
        $model->cidade = $_POST['cidade'];
        $model->local = $_POST['local'];
        $model->localizacao = $_POST['localizacao'];
        $model->valor = $_POST['valor'];
        $model->dataInicio = $_POST['dataInicio'];
        $model->dataFim = $_POST['dataFim'];
        $model->pagamento = $_POST['pagamento'];
        $model->vagas = $_POST['vagas'];
        $model->id_empresa = $_POST['id_empresa'];

        $model->save();

    }
}