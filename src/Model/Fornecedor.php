<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use PgSql\Connection;

class Fornecedor
{
    public Int $for_codigo;
    public String $for_descricao;

    public Connection $conexao;

    /**
     *
     * @param String $for_descricao
     * @param Connection $conexao
     */
    public function __construct(string $for_descricao, Connection $conexao)
    {
        $this->for_descricao = $for_descricao;
        $this->conexao = $conexao;
    }

    public function getForCodigo(): int
    {
        return $this->for_codigo;
    }

    public function getForDescricao(): string
    {
        return $this->for_descricao;
    }

    public function setForDescricao(string $for_descricao): void
    {
        $this->for_descricao = $for_descricao;
    }

    public function salvarFornecedor(): bool
    {
        $result = pg_query_params($this->conexao, "SELECT cadastrar_fornecedor($1)", array($this->for_descricao));

        if ($result && pg_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        return false;
    }


}