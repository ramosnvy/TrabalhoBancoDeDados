<?php

namespace Model;

class Produto
{
    public Int $pro_codigo;
    public Int $for_codigo;
    public String $pro_descricao;
    public Double $pro_valor;
    public Int $pro_quantidade;

    /**
     * @param Int $pro_codigo
     * @param Int $for_codigo
     * @param String $pro_descricao
     * @param float $pro_valor
     * @param Int $pro_quantidade
     */
    public function __construct(int $pro_codigo, int $for_codigo, string $pro_descricao, float $pro_valor, int $pro_quantidade)
    {
        $this->pro_codigo = $pro_codigo;
        $this->for_codigo = $for_codigo;
        $this->pro_descricao = $pro_descricao;
        $this->pro_valor = $pro_valor;
        $this->pro_quantidade = $pro_quantidade;
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

}