<?php

class EstacinamentoController
{
    public static function index()//Responsável por devolver dados da empresa
    {

        $model = new EstacionamentoModel();

        $model->getAllRows();
        include "View/modules/Estacionamento/ListaEstacionamento.php";
    }

    public static function form()//Responsável por devolver formulario
    {
        include "View/modules/Estacionamento/FormEstacionamento.php";
    }

    public static function save()//salvar resgistro no banco ou o atualizando
    {

        $model = new EstacionamentoModel();
        
        $model->id_estacionamento = $_POST['id_estacionamento'];
        $model->vagas = $_POST['vagas'];//preenchendo model
        $model->vagasVip = $_POST['vagasVip'];
        $model->vagasEspeciais = $_POST['vagasEspeciais'];
        $model->id_evento = $_POST['id_evento'];
        

        $model->save();
    }

    public static function delete()
    {
        $model = new EstacionamentoModel();

        $model->id_estacionamento = $_POST['id_estacionamento'];

        $model->delete($model->id_estacionamento);
    }
}