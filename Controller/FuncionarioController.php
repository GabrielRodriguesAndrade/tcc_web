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
        Security::requireValidCsrfToken();
        $model = new FuncionarioModel();

        $model->email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $model->cpf = preg_replace('/\D+/', '', $_POST['cpf'] ?? '');
        $model->senha = $_POST['senha'] ?? '';

        if ($model->email === false || strlen($model->cpf) !== 11) {
            throw new InvalidArgumentException('Dados do funcionário inválidos.');
        }

        $hash = null;
        $sal = null;

        Hash::transformaSenha($model->senha,$sal, $hash);

        $model->senha = $hash;
        $model->sal = $sal;

        $model->save();
    }
}
