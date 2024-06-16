<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use Model\Pessoa;

class Cliente extends Pessoa
{
    public Int $cli_codigo;
    public Int $pe_codigo;

    public function getCliCodigo(): int
    {
        return $this->cli_codigo;
    }

    public function getPeCodigo(): int
    {
        return $this->pe_codigo;
    }



}