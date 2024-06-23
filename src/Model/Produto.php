<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use Cassandra\Float_;
use PgSql\Connection;

class Produto
{
    public Int $pro_codigo;
    public Int $for_codigo;
    public String $pro_descricao;
    public Float $pro_valor;
    public Int $pro_quantidade;

    public Connection $conexao;
    /**
     * @param Int $for_codigo
     * @param String $pro_descricao
     * @param float $pro_valor
     * @param Int $pro_quantidade
     * @param Connection $conexao
     */
    public function __construct(int $for_codigo, string $pro_descricao, float $pro_valor, int $pro_quantidade, Connection $conexao)
    {
        $this->for_codigo = $for_codigo;
        $this->pro_descricao = $pro_descricao;
        $this->pro_valor = $pro_valor;
        $this->pro_quantidade = $pro_quantidade;
        $this->conexao = $conexao;
    }

    public function getProCodigo(): int
    {
        return $this->pro_codigo;
    }

    public function getForCodigo(): int
    {
        return $this->for_codigo;
    }

    public function getProDescricao(): string
    {
        return $this->pro_descricao;
    }

    public function setProDescricao(string $pro_descricao): void
    {
        $this->pro_descricao = $pro_descricao;
    }

    public function getProValor(): float
    {
        return $this->pro_valor;
    }

    public function setProValor(float $pro_valor): void
    {
        $this->pro_valor = $pro_valor;
    }

    public function getProQuantidade(): int
    {
        return $this->pro_quantidade;
    }

    public function setProQuantidade(int $pro_quantidade): void
    {
        $this->pro_quantidade = $pro_quantidade;
    }

    public function salvarProduto(): bool
    {
        $result = pg_query_params($this->conexao, "SELECT cadastrar_produto($1, $2, $3, $4)", array($this->pro_descricao, $this->pro_valor, $this->pro_quantidade, $this->for_codigo));

        if ($result && pg_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        return false;
    }

}