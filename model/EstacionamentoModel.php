<?php

class EstacionamentoModel
{
    public $vagas, $vagasEspeciais, $vagasVip, $id_evento;

    public $rows;

    public function save()
    {
        include 'DAO/EstacionamentoDAO.php';
        
        $dao = new EstacionamentoDAO();

        $dao->insert($this);//this aqui é o proprio objeto que esta chamando o metodo save la no controller
    }
    public function getAllRows()
    {
        include 'DAO/EstacionamentoDAO.php';
        
        $dao = new EstacionamentoDAO();

        $this->rows = $dao->select();
    }
}