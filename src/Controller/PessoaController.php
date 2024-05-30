<?php

namespace Controller;

require_once '\bd\TrabalhoBancoDeDados\src\Model\DB.php';

use Model\DB;
use Model\Pessoa;

class PessoaController
{
    public Int $pe_codigo;
    public String $pe_nome;
    public String $pe_senha;
    public String $pe_cpf;

    public String $pe_flagfuncionario;

    public function criarPessoa(String $pe_nome, String $pe_senha, String $pe_cpf, String $pe_flagfuncionario)
    {
        $PessoaCtlr = new Pessoa();

        $PessoaCtlr ->pe_nome = $pe_nome;
        $PessoaCtlr->pe_senha = $pe_senha;
        $PessoaCtlr ->pe_cpf = $pe_cpf;
        $PessoaCtlr->pe_flagfuncionario = $pe_flagfuncionario;

        $conexao = new DB();

        $conexao->criarConexao();
    }

    public function criarPessoa2()
    {
        $conexao = new DB();

        $conexao->criarConexao();
    }

}