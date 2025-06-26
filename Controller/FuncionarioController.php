<?php

class FuncionarioController
{
    public static function index()
    {
        $model = new FuncionarioModel();

        $model->id_funcionario = $_POST['id_funcionario'];
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->cpf = $_POST['cpf'];
        $model->telefone = $_POST['telefone'];
        $model->obs = $model->select($model->id_funcionario);
    }
}