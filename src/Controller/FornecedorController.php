<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\Fornecedor;
use PgSql\Connection;

class FornecedorController
{
    public Int $for_codigo;
    public String $for_descricao;

    public Connection $conexao;
    public function __construct(Connection $conexao)
    {
        $this->conexao = $conexao;
    }
    public function indexCadastrarFornecedor()
    {
        require_once __DIR__ . '/../view/header.php';
        require_once __DIR__ . '/../view/admin/cadastrar-fornecedor.php';
        require_once __DIR__ . '/../view/footer.php';
    }

    public function getFornecedores(): array
    {
        $result = pg_query($this->conexao, "SELECT * FROM vw_fornecedores");
        $funcionarios = [];

        while ($row = pg_fetch_assoc($result)) {
            $funcionarios[] = $row;
        }

        return $funcionarios;
    }

    public function salvarFornecedor()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->for_descricao = $_POST['nomeFornecedor'];
        }

        $fornecedorModel = new Fornecedor($this->for_descricao, $this->conexao);

        if($fornecedorModel->salvarFornecedor()){
            session_start();
            $_SESSION['alerta'] = "Fornecedor cadastrado com sucesso!";
            header("Location: /admin/dashboard/cadastrar/fornecedor");
            exit();
        }
    }
}