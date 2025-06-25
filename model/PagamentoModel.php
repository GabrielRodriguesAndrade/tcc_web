<?php 

class PagamentoModel
{
    public $valor, $entrada, $saida, $id_evento, $id_carro;

    public $rows;
    
    public function getAllRows()
    {
        $dao = new PagamentoDAO();

        $this->rows = $dao->select();
    }
}