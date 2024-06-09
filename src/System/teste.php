<?php

use Pedro\TrabalhoBancoDeDados\Controller\PessoaController;
use Pedro\TrabalhoBancoDeDados\Controller\VendaController;
use Pedro\TrabalhoBancoDeDados\Model\DB;

require_once "../../vendor/autoload.php";

$pessoa = New PessoaController();
$pessoa->pe_nome = "Pedro";
$pessoa->pe_senha = "123";
$pessoa->pe_cpf = "23231232312";
$pessoa->pe_flagfuncionario = "F";

$db = new DB();
$conexao = $db->criarConexao();
//$pessoa->criarPessoa($conexao);



$venda = new VendaController();
$venda->fun_codigo = 1;
$venda->ven_horario = "20-02-2023";
$venda->ven_valor_total = 10.00;
$venda->criarVenda($conexao);