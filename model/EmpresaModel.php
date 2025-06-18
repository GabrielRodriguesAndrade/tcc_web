<?php

class EmpresaModel
{
    public $id_empresa, $nome, $email, $cnpj, $senha, $sal;
    public $rows;
    public function save()
    {
        include 'DAO/EmpresaDAO.php';
        
        $dao = new EmpresaDAO();

        $dao->insert($this);//this aqui é o proprio objeto que esta chamando o metodo save la no controller
    }
    public function getAllRows()
    {
        include 'DAO/EmpresaDAO.php';
        
        $dao = new EmpresaDAO();

        $this->rows = $dao->select();
    }
}