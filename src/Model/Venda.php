<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use PgSql\Connection;

class Venda
{
    public Int $ven_codigo;
    public String $ven_horario;
    public float $ven_valor_total;
    public Int $fun_codigo;

    public Int $pe_codigo;

    public Connection $conexao;

    /**
     *
     * @param float $ven_valor_total
     * @param Int $fun_codigo
     * @param Int $pe_codigo
     */
    public function __construct(float $ven_valor_total, int $fun_codigo, int $pe_codigo, Connection $conexao)
    {
        $this->ven_valor_total = $ven_valor_total;
        $this->fun_codigo = $fun_codigo;
        $this->pe_codigo = $pe_codigo;
        $this->conexao = $conexao;
    }

    public function getVenCodigo(): int
    {
        return $this->ven_codigo;
    }

    public function getVenHorario(): \DateTime
    {
        return $this->ven_horario;
    }

    public function getPeCodigo(): int
    {
        return $this->pe_codigo;
    }

    public function setPeCodigo(int $pe_codigo): void
    {
        $this->pe_codigo = $pe_codigo;
    }

    public function setVenHorario(String $ven_horario): void
    {
        $this->ven_horario = $ven_horario;
    }

    public function getVenValorTotal(): float
    {
        return $this->ven_valor_total;
    }

    public function setVenValorTotal(float $ven_valor_total): void
    {
        $this->ven_valor_total = $ven_valor_total;
    }

    public function getFunCodigo(): int
    {
        return $this->fun_codigo;
    }

    public function registrarVenda()
    {
        var_dump($this->ven_valor_total, $this->fun_codigo, $this->pe_codigo);

        $result = pg_query_params($this->conexao,
            "SELECT inserir_Venda($1::numeric, $2::bigint, $3::bigint)",
            array($this->ven_valor_total, $this->fun_codigo, $this->pe_codigo)
        );

        if ($result && pg_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        return false;
    }
}