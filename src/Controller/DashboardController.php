<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\DB;
use PgSql\Connection;

class DashboardController
{
    public Connection $conexao;

    public function __construct(Connection $conexao)
    {
        $this->conexao = $conexao;
    }
    public function index()
    {
        $vendaController = new VendaController($this->conexao);
        $vendaInfo = $vendaController->getVendaInfo();
        $vendasRecentes = $vendaController->getVendasRecentes();

        $clienteController = new ClienteController($this->conexao);
        $clienteInfo = $clienteController->getClienteInfoQtd();

        $dados = [
            "vendaInfo" => $vendaInfo,
            "clienteInfo" => $clienteInfo,
            'vendasRecentes' => $vendasRecentes,
        ];

        if($_SESSION['usuario_autenticado'] = true){
            require_once __DIR__ . '/../view/header.php';
            extract($dados);
            require_once __DIR__ . '/../view/admin/dashbord.php';
            require_once __DIR__ . '/../view/footer.php';
        }
    }

    public function indexSistema()
    {
        if($_SESSION['usuario_autenticado'] = true){
            require_once __DIR__ . '/../view/header.php';
            require_once __DIR__ . '/../view/admin/sistema.php';
            require_once __DIR__ . '/../view/footer.php';
        }
    }

    public function gerarBackup()
    {
        $db = new DB();
        $db->gerarBackup();
    }
}