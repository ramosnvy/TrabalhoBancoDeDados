<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\DB;
class DashboardController
{
    public function index()
    {
        if($_SESSION['usuario_autenticado'] = true){
            require_once __DIR__ . '/../view/header.php';
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