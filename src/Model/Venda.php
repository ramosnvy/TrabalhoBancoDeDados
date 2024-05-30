<?php

namespace Model;

class Venda
{
    public Int $ven_codigo;
    public \DateTime $ven_horario;
    public Double $ven_valor_total;
    public Int $fun_codigo;

    /**
     * @param Int $ven_codigo
     * @param \DateTime $ven_horario
     * @param float $ven_valor_total
     * @param Int $fun_codigo
     */
    public function __construct(int $ven_codigo, \DateTime $ven_horario, float $ven_valor_total, int $fun_codigo)
    {
        $this->ven_codigo = $ven_codigo;
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

    public function setVenHorario(\DateTime $ven_horario): void
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

}