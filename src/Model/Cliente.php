<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use Model\Pessoa;
use PgSql\Connection;

class Cliente extends Pessoa
{
    public Int $cli_codigo;
    public Int $pe_codigo;
    public Connection $conexao;

    public function __construct(Connection $conexao)
    {
        $this->conexao = $conexao;
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