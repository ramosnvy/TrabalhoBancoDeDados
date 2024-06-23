<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Cassandra\Float_;
use Pedro\TrabalhoBancoDeDados\Model\Produto;
use Pedro\TrabalhoBancoDeDados\Model\Venda;
use PgSql\Connection;

class ProdutoController
{
    public Int $pro_codigo;
    public Int $for_codigo;
    public String $pro_descricao;
    public Float $pro_valor;
    public Int $pro_quantidade;

    public Connection $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function indexCadastrarProduto()
    {
        $fornecedorController = new FornecedorController($this->conexao);
        $fornecedores = $fornecedorController->getFornecedores();

        $dados = [
            "fornecedores"=>$fornecedores,
        ];

        require_once __DIR__ . '/../view/header.php';
        extract($dados);
        require_once __DIR__ . '/../view/admin/cadastrar-produto.php';
        require_once __DIR__ . '/../view/footer.php';
    }

    public function getProdutos(): array
    {
        $result = pg_query($this->conexao, "SELECT * FROM vw_produtos");
        $produtos = [];

        while ($row = pg_fetch_assoc($result)) {
            $produtos[] = $row;
        }

        return $produtos;
    }

    public function salvarProduto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->for_codigo = intval($_POST['fornecedor']);
            $this->pro_descricao = $_POST['descricao'];
            $this->pro_quantidade = intval($_POST['quantidade']);
            $this->pro_valor = floatval($_POST['valor']);
        }
        $Produto = new Produto($this->for_codigo, $this->pro_descricao, $this->pro_valor, $this->pro_quantidade, $this->conexao);

        if($Produto->salvarProduto()){
            session_start();
            $_SESSION['alerta'] = "Produto cadastrado com sucesso!";
            header("Location: /admin/dashboard/cadastrar/mercadoria");
            exit();
        }
    }
}