<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use mysql_xdevapi\Warning;
use Pedro\TrabalhoBancoDeDados\Model\Cliente;
use Pedro\TrabalhoBancoDeDados\Model\DB;
use Pedro\TrabalhoBancoDeDados\Model\Pessoa;
use Pedro\TrabalhoBancoDeDados\Model\Venda;
use PgSql\Connection;

class VendaController
{
    public Int $ven_codigo;
    public String $ven_horario;
    public float $ven_valor_total;
    public Int $fun_codigo;

    public Int $pe_codigo;

    public Connection $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao; // Passa a conexão para o UsuarioModel

    }

    public function indexRegistrarVenda()
    {
        $clienteModel = new ClienteController($this->conexao);
        $clientes = $clienteModel->getClientes();

        $funcionarioModel = new FuncionarioController($this->conexao);
        $funcionarios = $funcionarioModel->getFuncionarios();

        $produtoModel = new ProdutoController($this->conexao);
        $produtos = $produtoModel->getProdutos();

        // ... (consulta ao banco de dados)
        $dados = [
            'clientes' => $clientes,
            "funcionarios" => $funcionarios,
            "produtos" => $produtos,
        ];

        require_once __DIR__ . '/../view/header.php';
        extract($dados); // Extrai as variáveis do array para o escopo atual
        require_once __DIR__ . '/../view/admin/registro-venda.php';
        require_once __DIR__ . '/../view/footer.php';
    }

    public function salvarVenda()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->fun_codigo = intval($_POST['funcionario']);
            $this->ven_valor_total = floatval($_POST['valorTotal']);
            $this->pe_codigo = intval($_POST['cliente']);
        }
        $VendaCtrl = new Venda($this->ven_valor_total, $this->fun_codigo, $this->pe_codigo, $this->conexao);
        $VendaCtrl->registrarVenda();
    }
}