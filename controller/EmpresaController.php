<?php

class EmpresaController
{
    public static function index()//Responsável por devolver dados da empresa
    {
       $model = new EmpresaModel();

        $model->getAllRows();
        include "View/modules/Empresa/ListaEmpresa.php";
    }

    public static function form()//Responsável por devolver formulario
    {
        include "View/modules/Empresa/FormEmpresa.php";
    }

    public static function save()
    {
        $model = new EmpresaModel();

        $model->nome = $_POST['nome'];//preenchendo model
        $model->email = $_POST['email'];
        $model->cnpj = $_POST['cnpj'];
        $model->senha = $_POST['senha'];
        $model->id_empresa = $_POST['id_empresa'];

        $model->save();
    }

    public static function delete()
    {
        $model = new EmpresaModel();

        $model->id_empresa = $_POST['id_empresa'];

        $model->delete($model->id_empresa);
    }
}