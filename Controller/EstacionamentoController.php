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

    public static function save()//salvar o formulario no banco
    {

        $model = new EstacionamentoModel();

        $model->vagas = $_POST['vagas'];//preenchendo model
        $model->vagasVip = $_POST['vagasVip'];
        $model->vagasEspeciais = $_POST['vagasEspeciais'];
        $model->id_evento = $_POST['id_evento'];
        

        $model->save();

    }
}