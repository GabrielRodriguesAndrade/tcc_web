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
        Security::requireValidCsrfToken();
        $model = new EmpresaModel();

        $model->nome = trim($_POST['nome'] ?? '');
        $model->email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $model->cnpj = preg_replace('/\D+/', '', $_POST['cnpj'] ?? '');
        $model->id_empresa = filter_input(INPUT_POST, 'id_empresa', FILTER_VALIDATE_INT) ?: null;

        if ($model->nome === '' || $model->email === false || strlen($model->cnpj) !== 14) {
            throw new InvalidArgumentException('Dados da empresa inválidos.');
        }

        $salt = null;
        $hash = null;
        Hash::transformaSenha($_POST['senha'] ?? '', $salt, $hash);
        $model->senha = $hash;

        $model->save();
    }

    public static function delete()
    {
        Security::requireValidCsrfToken();
        $model = new EmpresaModel();

        $model->id_empresa = filter_input(INPUT_POST, 'id_empresa', FILTER_VALIDATE_INT);

        if (!$model->id_empresa) {
            throw new InvalidArgumentException('Empresa inválida.');
        }

        $model->delete($model->id_empresa);
    }
}
