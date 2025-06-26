<?php

class FuncionarioModel
{
    public $id_funcionario, $nome, $email, $cpf, $telefone,  $obs = [];

    public $rows;

    public function select(int $id_funcionario)
    {
        $dao = new FuncionarioDAO();

        $dao->select($id_funcionario);
    }

}