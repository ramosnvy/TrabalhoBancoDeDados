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
    public String $pe_usuario;
    public String $pe_flagtipopessoa;
    public $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao; // Passa a conexão para o UsuarioModel

    }
    public function indexCadastrarPessoa(){
        require_once __DIR__ . '/../view/header.php';
        require_once __DIR__ . '/../view/admin/cadastrar-pessoa.php';
        require_once __DIR__ . '/../view/footer.php';
    }

    public function salvarPessoa()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->pe_nome = $_POST['nome'];
            $this->pe_cpf = $_POST['cpf'];
            $this->pe_flagtipopessoa = $_POST['tipo'];
            $this->pe_usuario = $_POST['usuario'];
            $this->pe_senha = $_POST['senha'];
        }

        $PessoaCtlr = new Pessoa($this->pe_nome,$this->pe_senha,$this->pe_cpf, $this->pe_flagtipopessoa, $this->pe_usuario, $this->conexao );

        if($PessoaCtlr->salvarPessoa()){
            session_start();
            $_SESSION['alerta'] = "Pessoa cadastrada com sucesso!";
            header("Location: /admin/dashboard/cadastrar/pessoa");
            exit();
        }
    }
}