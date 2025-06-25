<?php

class EmpresaModel
{
    public $id_empresa, $nome, $email, $cnpj, $senha, $sal;
    public $rows;

    public function save(EmpresaModel $model)
    {
        $dao = new EmpresaDAO();

       is_null($model->id_empresa)? $dao->insert($model) : $dao->update($model);
    }

    public function getAllRows()
    {        
        $dao = new EmpresaDAO();

        $this->rows = $dao->select();
    }

    public function delete(int $id_empresa)
    {
        $dao = new EmpresaDAO();

        $dao->delete($id_empresa);
    }
}