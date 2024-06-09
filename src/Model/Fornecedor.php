<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

class Fornecedor
{
    public Int $for_codigo;
    public String $for_descricao;

    /**
     * @param Int $for_codigo
     * @param String $for_descricao
     */
    public function __construct(int $for_codigo, string $for_descricao)
    {
        $this->for_codigo = $for_codigo;
        $this->for_descricao = $for_descricao;
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



}