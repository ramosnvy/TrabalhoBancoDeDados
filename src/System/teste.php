<?php
require_once  '\bd\TrabalhoBancoDeDados\src\Controller\PessoaController.php';

use Controller\PessoaController;

$pessoa = New PessoaController();
$pessoa->pe_nome = "Pedro";
$pessoa->criarPessoa2();