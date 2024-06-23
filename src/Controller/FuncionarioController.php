<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\Funcionario;
use PgSql\Connection;

class FuncionarioController
{
    public Int $fun_codigo;
    public Int $pe_codigo;
    public String $fun_funcao;

    public Connection $conexao;

    public function __construct(Connection $conexao)
    {
        $this->conexao = $conexao;
    }
    public function getFuncionarios(): array
    {
        $result = pg_query($this->conexao, "SELECT * FROM vw_funcionarios");
        $funcionarios = [];

        while ($row = pg_fetch_assoc($result)) {
            $funcionarios[] = $row;
        }

        return $funcionarios;
    }
}