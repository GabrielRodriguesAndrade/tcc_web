<?php

class EventoModel
{
    public $id_evento, $nome, $cidade, $local , $localizacao, $valor, $dataInicio, $dataFim, $pagamento, $vagas, $id_empresa;

    public $rows;

    public function save()
    {
        include 'DAO/EventoDAO.php';
        
        $dao = new EventoDAO();

        $dao->insert($this);//this aqui é o proprio objeto que esta chamando o metodo save la no controller
    }
    public function getAllRows()
    {
        include 'DAO/EventoDAO.php';
        
        $dao = new EventoDAO();

        $this->rows = $dao->select();
    }
}