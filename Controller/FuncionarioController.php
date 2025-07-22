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

    public static function save()
    {
        $model = new FuncionarioModel();

        $model->email = $_POST['email'];
        $model->cpf = $_POST['cpf'];
        $model->senha = $_POST['senha'];

        $hash = '';//recebe a senha ja transformada em hash
        $sal = '';//padrao usado pra transformar

        Hash::transformaSenha($model->senha,$sal, $hash);

        $model->senha = $hash;
        $model->sal = $sal;

        $model->save();
    }
}