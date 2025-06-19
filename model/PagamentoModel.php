<?php 

class PagamentoModel
{
    public $valor, $entrada, $saida, $id_evento, $id_carro;

    public $rows;
    
    public function getAllRows()
    {
        include "DAO/PagamentoDAO.php";

        $dao = new PagamentoDAO();

        $this->rows = $dao->select();
    }
}