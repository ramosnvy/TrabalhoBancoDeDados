<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\Funcionario;

class FuncionarioController
{
    public Int $fun_codigo;
    public Int $pe_codigo;
    public String $fun_funcao;

    public function criarFuncionario(Connection $connection)
    {
        $FuncionarioCtrl = new Funcionario($this->fun_codigo, $this->pe_codigo, $this->fun_funcao);
        $FuncionarioCtrl->salvarFuncionario($FuncionarioCtrl, $connection);
    }
}