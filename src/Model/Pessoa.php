<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use PgSql\Connection;

class Pessoa
{
    public Int $pe_codigo;
    public String $pe_nome;
    public String $pe_senha;
    public String $pe_cpf;

    public String $pe_flagfuncionario;

    /**
     * @param String $pe_nome
     * @param String $pe_senha
     * @param String $pe_cpf
     */
    public function __construct( string $pe_nome, string $pe_senha, string $pe_cpf, string $pe_flagfuncionario)
    {
        $this->pe_nome = $pe_nome;
        $this->pe_senha = $pe_senha;
        $this->pe_cpf = $pe_cpf;
        $this->pe_flagfuncionario = $pe_flagfuncionario;
    }

    public function getPeCodigo(): int
    {
        return $this->pe_codigo;
    }

    public function setPeCodigo(int $pe_codigo): void
    {
        $this->pe_codigo = $pe_codigo;
    }

    public function getPeNome(): string
    {
        return $this->pe_nome;
    }

    public function setPeNome(string $pe_nome): void
    {
        $this->pe_nome = $pe_nome;
    }

    public function getPeSenha(): string
    {
        return $this->pe_senha;
    }

    public function setPeSenha(string $pe_senha): void
    {
        $this->pe_senha = $pe_senha;
    }

    public function getPeCpf(): string
    {
        return $this->pe_cpf;
    }

    public function setPeCpf(string $pe_cpf): void
    {
        $this->pe_cpf = $pe_cpf;
    }

    public function getPeFlagfuncionario(): string
    {
        return $this->pe_flagfuncionario;
    }

    public function setPeFlagfuncionario(string $pe_flagfuncionario): void
    {
        $this->pe_flagfuncionario = $pe_flagfuncionario;
    }

    public function salvarPessoa(Pessoa $pessoa, Connection $conexao): void
    {
        $query = "INSERT INTO tb_pessoas (pe_nome, pe_senha, pe_cpf, pe_flagfuncionario) VALUES ('$this->pe_nome', '$this->pe_senha', '$this->pe_cpf', '$this->pe_flagfuncionario')";

        $retorno = pg_query($conexao, $query);

        if ($retorno) {
            echo "Pessoa salva com sucesso.";
        } else {
            echo "Erro ao salvar pessoa.";
        }

        pg_close($conexao);
    }
}