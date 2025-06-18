<?php

class EmpresaController
{
    public static function index()//Responsável por devolver dados da empresa
    {
        include "View/modules/Empresa/ListaEmpresa.php";
    }

    public static function form()//Responsável por devolver formulario
    {
        include "View/modules/Empresa/FormEmpresa.php";
    }

    public static function save()
    {
        include 'Model/EmpresaModel.php';

        $model = new EmpresaModel();

        $model->nome = $_POST['nome'];//preenchendo model
        $model->email = $_POST['email'];
        $model->cnpj = $_POST['cnpj'];
        $model->senha = $_POST['senha'];

        $model->save();

    }
}