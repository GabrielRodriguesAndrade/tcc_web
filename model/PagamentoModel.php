<?php 

class PagamentoModel
{
    public $valor, $entrada, $saida, $id_evento, $id_carro;

    public $rows;
    
    public function getAllRows(int $id_evento)
    {
        $dao = new PagamentoDAO();

        $this->rows = $dao->select($id_evento);
        return $this->rows;
    }
}