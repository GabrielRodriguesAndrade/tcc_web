<?php

class CarroModel
{
    public $id_carro, $telefone, $placa, $modelo, $obs = [], $vaga, $estacionado, $id_estacionamento;

    public $rows;

    public function getAllRows(int $id_estacionamento)
    {        
        $dao = new CarroDAO();

        $this->rows = $dao->select($id_estacionamento);
    }

    // public function save()
    // {
    //     $dao = new CarroDAO();

    //     $model = new CarroModel();

    //     $model->id_carro = $_POST['id_carro'];
    //     $model->telefone = $_POST['telefone'];
    //     $model->placa = $_POST['placa'];
    //     $model->modelo = $_POST['modelo'];
    //     $model->vaga = $_POST['vaga'];
    //     $model->estacionado = $_POST['estacionado'];
    //     $model->id_estacionamento = $_POST['id_estacionamento'];

    //     $dao->save($model);
    // }
}