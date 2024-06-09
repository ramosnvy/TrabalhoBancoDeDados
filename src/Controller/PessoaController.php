<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\DB;
use Pedro\TrabalhoBancoDeDados\Model\Pessoa;
use PgSql\Connection;

class PessoaController
{
    public Int $pe_codigo;
    public String $pe_nome;
    public String $pe_senha;
    public String $pe_cpf;

    public String $pe_flagfuncionario;

    public function criarPessoa(Connection $conexao)
    {
        $PessoaCtlr = new Pessoa($this->pe_nome,$this->pe_senha,$this->pe_cpf, $this->pe_flagfuncionario  );
        $PessoaCtlr->salvarPessoa($PessoaCtlr, $conexao);
    }
}