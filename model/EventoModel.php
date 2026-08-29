<?php

class EventoModel
{
    public $id_evento, $nome, $cidade, $local , $localizacao, $valor, $dataInicio, $dataFim, $pagamento, $vagas, $id_empresa;

    public $rows;
    public $funcionarios, $candidatos;
    public function save(EventoModel $model)
    {  
        $dao = new EventoDAO();

        is_null($model->id_evento) ? $dao->insert($model) : $dao->update($model);//this aqui é o proprio objeto que esta chamando o metodo save la no controller
    }

    public function getAllRows(int $id_empresa)
    {
        
        $dao = new EventoDAO();

        $this->rows = $dao->select($id_empresa);
    }

    public function delete(int $id_evento)
    {
        $dao = new EventoDAO();

        $dao->delete($id_evento);
    }
}