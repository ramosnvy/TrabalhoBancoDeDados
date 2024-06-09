<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use PgSql\Connection;

class Venda
{
    public Int $ven_codigo;
    public String $ven_horario;
    public float $ven_valor_total;
    public Int $fun_codigo;

    /**
     * @param Int $ven_codigo
     * @param String $ven_horario
     * @param float $ven_valor_total
     * @param Int $fun_codigo
     */
    public function __construct(String $ven_horario, float $ven_valor_total, int $fun_codigo)
    {
        $this->ven_horario = $ven_horario;
        $this->ven_valor_total = $ven_valor_total;
        $this->fun_codigo = $fun_codigo;
    }

    public function getVenCodigo(): int
    {
        return $this->ven_codigo;
    }

    public function getVenHorario(): \DateTime
    {
        return $this->ven_horario;
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

    public function salvarVenda(Venda $venda, Connection $conexao)
    {
        $query = "INSERT INTO tb_vendas (ven_horario, ven_valor_total, fun_codigo) VALUES ('$this->ven_horario', '$this->ven_valor_total', '$this->fun_codigo')";

        $retorno = pg_query($conexao, $query);

        if ($retorno) {
            echo "Venda salva com sucesso.";
        } else {
            echo "Erro ao salvar Venda.";
        }

        pg_close($conexao);
    }
}