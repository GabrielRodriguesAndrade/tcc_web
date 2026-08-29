<?php 

class CarroController
{
    public static function index()
    {
        $model = new CarroModel();

        $id_estacionamento = $_POST['id_estacionamento'];

        $model->getAllRows($id_estacionamento);
    }
}