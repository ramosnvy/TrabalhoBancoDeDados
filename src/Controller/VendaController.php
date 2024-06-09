<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use mysql_xdevapi\Warning;
use Pedro\TrabalhoBancoDeDados\Model\DB;
use Pedro\TrabalhoBancoDeDados\Model\Venda;
use PgSql\Connection;

class VendaController
{
    public Int $ven_codigo;
    public String $ven_horario;
    public float $ven_valor_total;
    public Int $fun_codigo;

    public function criarVenda(Connection $connection)
    {
        $VendaCtrl = new Venda($this->ven_horario, $this->ven_valor_total, $this->fun_codigo);
        $VendaCtrl->salvarVenda($VendaCtrl, $connection);
    }
}