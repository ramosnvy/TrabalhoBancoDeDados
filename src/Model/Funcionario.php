<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use Model\Pessoa;
use PgSql\Connection;

class Funcionario extends Pessoa
{
    public Int $fun_codigo;
    public Int $pe_codigo;
    public String $fun_funcao;

    /**
     * @param Int $fun_codigo
     * @param Int $pe_codigo
     * @param String $fun_funcao
     */
    public function __construct(int $fun_codigo, int $pe_codigo, string $fun_funcao)
    {
        $this->fun_codigo = $fun_codigo;
        $this->pe_codigo = $pe_codigo;
        $this->fun_funcao = $fun_funcao;
    }

    public function getFunCodigo(): int
    {
        return $this->fun_codigo;
    }

    public function getPeCodigo(): int
    {
        return $this->pe_codigo;
    }
    
    public function getFunFuncao(): string
    {
        return $this->fun_funcao;
    }

    public function setFunFuncao(string $fun_funcao): void
    {
        $this->fun_funcao = $fun_funcao;
    }

    public function salvarFuncionario(Funcionario $funcionario, Connection $conexao)
    {
        $query = "INSERT INTO tb_funcionarios (fun_codigo, pe_codigo, fun_funcao) VALUES ('$this->fun_codigo', '$this->pe_codigo', '$this->fun_funcao')";

        $retorno = pg_query($conexao, $query);

        if ($retorno) {
            echo "Funcionario salva com sucesso.";
        } else {
            echo "Erro ao salvar Funcionario.";
        }

        pg_close($conexao);
    }
}