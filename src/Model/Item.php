<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use PgSql\Connection;

class Item
{
    public Int $ite_codigo;
    public Int $ite_quantidade;
    public float $ite_valor_parcial;
    public Int $pro_codigo;
    public Int $ven_codigo;

    public Connection $conexao;

    /**
     * @param Int $ite_codigo
     * @param Int $ite_quantidade
     * @param float $ite_valor_parcial
     * @param Int $pro_codigo
     * @param Int $ven_codigo
     */
    public function __construct(int $ite_quantidade, float $ite_valor_parcial, int $pro_codigo, int $ven_codigo, Connection $conexao)
    {
        $this->ite_quantidade = $ite_quantidade;
        $this->ite_valor_parcial = $ite_valor_parcial;
        $this->pro_codigo = $pro_codigo;
        $this->ven_codigo = $ven_codigo;
        $this->conexao = $conexao;
    }

    public function getIteCodigo(): int
    {
        return $this->ite_codigo;
    }

    public function setIteCodigo(int $ite_codigo): void
    {
        $this->ite_codigo = $ite_codigo;
    }

    public function getIteQuantidade(): int
    {
        return $this->ite_quantidade;
    }

    public function setIteQuantidade(int $ite_quantidade): void
    {
        $this->ite_quantidade = $ite_quantidade;
    }

    public function getIteValorParcial(): float
    {
        return $this->ite_valor_parcial;
    }

    public function setIteValorParcial(float $ite_valor_parcial): void
    {
        $this->ite_valor_parcial = $ite_valor_parcial;
    }

    public function getProCodigo(): int
    {
        return $this->pro_codigo;
    }

    public function getVenCodigo(): int
    {
        return $this->ven_codigo;
    }

    public function registrarItem(): bool
    {
        $result = pg_query_params($this->conexao,
            "SELECT inserir_item($1::integer, $2::numeric, $3::integer, $4::integer)",
            array($this->ite_quantidade, $this->ite_valor_parcial, $this->pro_codigo, $this->ven_codigo)
        );

        if ($result && pg_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        return false;
    }

}
