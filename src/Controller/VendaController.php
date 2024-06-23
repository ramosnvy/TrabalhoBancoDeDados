<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use mysql_xdevapi\Warning;
use Pedro\TrabalhoBancoDeDados\Model\Cliente;
use Pedro\TrabalhoBancoDeDados\Model\DB;
use Pedro\TrabalhoBancoDeDados\Model\Item;
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
    public Int $pro_codigo;

    public Int $pro_quantidade;

    public Float $pro_valunitario;

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
            "clientes" => $clientes,
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
            $this->pro_codigo = intval($_POST['pro_codigo']);
            $this->pro_quantidade = intval($_POST['pro_quantidade']);
            $this->pro_valunitario = floatval($_POST['pro_valor_unitario']);
        }
        $VendaCtrl = new Venda($this->ven_valor_total, $this->fun_codigo, $this->pe_codigo, $this->conexao);
        $VendaCtrl->registrarVenda();

        $ven_codigo = $VendaCtrl->getUltimoCodigoVenda();
        $item = new Item($this->pro_quantidade, $this->pro_valunitario, $this->pro_codigo, $ven_codigo, $this->conexao);
        $item->registrarItem();

        session_start();
        $_SESSION['alerta'] = "Venda registrada com sucesso!";
        header("Location: /admin/dashboard/registrar/venda");
        exit();
    }

    public function getVendaInfo(): array
    {
        $result = pg_query($this->conexao, "SELECT qtdVendas FROM vw_vendasinfo");

        $vendasInfo = [];

        while ($row = pg_fetch_assoc($result)   ) {
            $vendasInfo[] = $row;
        }

        return $vendasInfo;

    }

    public function getVendasRecentes(): array
    {
        $result = pg_query($this->conexao, "SELECT * FROM vw_vendas_recentes");

        $vendasRecentes = [];

        while ($row = pg_fetch_assoc($result)   ) {
            $vendasRecentes[] = $row;
        }

        return $vendasRecentes;

    }

}