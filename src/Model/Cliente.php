<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use Model\Pessoa;

class Cliente extends Pessoa
{
    public Int $cli_codigo;
    public Int $pe_codigo;

    /**
     * @param Int $cli_codigo
     * @param Int $pe_codigo
     */
    public function __construct(int $cli_codigo, int $pe_codigo)
    {
        $this->cli_codigo = $cli_codigo;
        $this->pe_codigo = $pe_codigo;
    }

    public function getCliCodigo(): int
    {
        return $this->cli_codigo;
    }

    public function getPeCodigo(): int
    {
        return $this->pe_codigo;
    }



}