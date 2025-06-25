<?php

class EstacionamentoModel
{
    public $vagas, $vagasEspeciais, $vagasVip, $id_evento;

    public $rows;
    
    public function save(EstacionamentoModel $model)
    {  
        $dao = new EstacionamentoDAO();

        is_null($model->id_estacionamento) ? $dao->insert($model) : $dao->update($model);
    }

    public function getAllRows()
    { 
        $dao = new EstacionamentoDAO();

        $this->rows = $dao->select();
    }

    public function delete(int $id_estacionamento)
    {
        $dao = new EstacionamentoDAO();

        $dao->delete($id_estacionamento);
    }
}