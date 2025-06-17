<?php

class EmpresaController
{
    public static function index()//Responsável por devolver dados da empresa
    {
        include "View/modules/Empresa/ListaEmpresa.php";
    }

    public static function form()//Responsável por devolver formulario
    {
        include "View/modules/Empresa/ListaEmpresa.php";
    }
}