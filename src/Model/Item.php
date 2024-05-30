<?php

namespace Model;

class Item
{
    public Int $ite_codigo;
    public Int $ite_quantidade;
    public Double $ite_valor_parcial;
    public Int $pro_codigo;
    public Int $ven_codigo;

    /**
     * @param Int $ite_codigo
     * @param Int $ite_quantidade
     * @param float $ite_valor_parcial
     * @param Int $pro_codigo
     * @param Int $ven_codigo
     */
    public function __construct(int $ite_codigo, int $ite_quantidade, float $ite_valor_parcial, int $pro_codigo, int $ven_codigo)
    {
        $this->ite_codigo = $ite_codigo;
        $this->ite_quantidade = $ite_quantidade;
        $this->ite_valor_parcial = $ite_valor_parcial;
        $this->pro_codigo = $pro_codigo;
        $this->ven_codigo = $ven_codigo;
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


}
