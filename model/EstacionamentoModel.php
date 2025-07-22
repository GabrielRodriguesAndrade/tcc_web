<?php

class EstacionamentoModel
{
    public $vagas, $vagasEspeciais, $vagasVip, $id_evento, $id_estacionamento;

    public $rows;
    
    public function save(EstacionamentoModel $model)
    {  
        $dao = new EstacionamentoDAO();

        is_null($model->id_estacionamento) ? $dao->insert($model) : $dao->update($model);
    }

    public function getAllRows(int $id_evento)
    { 
        $dao = new EstacionamentoDAO();

        $this->rows = $dao->select($id_evento);
    }

    public function delete(int $id_estacionamento)
    {
        $dao = new EstacionamentoDAO();

        $dao->delete($id_estacionamento);
    }
}