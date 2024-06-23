<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Pedro\TrabalhoBancoDeDados\Controller\FornecedorController;
use Pedro\TrabalhoBancoDeDados\Controller\LoginController;
use Pedro\TrabalhoBancoDeDados\Controller\DashboardController;
use Pedro\TrabalhoBancoDeDados\Controller\PessoaController;
use Pedro\TrabalhoBancoDeDados\Controller\ProdutoController;
use Pedro\TrabalhoBancoDeDados\Controller\VendaController;
use Pedro\TrabalhoBancoDeDados\Model\DB;

$db = new DB();
$adminConexao = $db->criarConexaoAdmin();
$clienteConexao = $db->criarConexaoCliente();

// Mapeamento de Wildcards
$wildcards = [
    '(:numeric)' => '[0-9]+',
    '(:alpha)' => '[a-z]+',
    '(:any)' => '[a-z0-9]+',
];

// Rotas e seus Controladores Associados (com métodos)
$routes = [
    '/admin/login' => [
        'method' => 'GET',
        'controller' => LoginController::class . '@indexAdmin'
    ],
    '/login/autenticar' => [
        'method' => 'POST',
        'controller' => LoginController::class . '@autenticar'
    ],
    '/login' => [
        'method' => 'GET',
        'controller' => LoginController::class . '@indexCliente'
    ],

    '/admin/dashboard' => [
        'method' => 'GET',
        'controller' => DashboardController::class . '@index'
    ],
    '/admin/dashboard/sistema' => [
        'method' => 'GET',
        'controller' => DashboardController::class . '@indexSistema'
    ],
    '/admin/dashboard/sistema/gerarbackup' => [
        'method' => 'GET',
        'controller' => DashboardController::class . '@gerarBackup'
    ],
    '/admin/dashboard/cadastrar/pessoa' => [
        'method' => 'GET',
            'controller' => PessoaController::class . '@indexCadastrarPessoa'
    ],
    '/admin/dashboard/cadastrar/pessoa/salvar' => [
        'method' => 'POST',
        'controller' => PessoaController::class . '@salvarPessoa'
    ],'/admin/dashboard/registrar/venda' => [
        'method' => 'GET',
        'controller' => VendaController::class . '@indexRegistrarVenda'
    ],'/admin/dashboard/registrar/venda/salvar' => [
        'method' => 'POST',
        'controller' => VendaController::class . '@salvarVenda'
    ],'/admin/dashboard/cadastrar/fornecedor' => [
        'method' => 'GET',
        'controller' => FornecedorController::class . '@indexCadastrarFornecedor'
    ],
    '/admin/dashboard/cadastrar/fornecedor/salvar' => [
        'method' => 'POST',
        'controller' => FornecedorController::class . '@salvarFornecedor'
    ],'/admin/dashboard/cadastrar/produto' => [
        'method' => 'GET',
        'controller' => ProdutoController::class . '@indexCadastrarProduto'
    ],
    '/admin/dashboard/cadastrar/produto/salvar' => [
        'method' => 'POST',
        'controller' => ProdutoController::class . '@salvarProduto'
    ],'/admin/sair' => [
        'method' => 'GET',
        'controller' => LoginController::class . '@sair'
    ],

];

// Encontra a Rota Correspondente (incluindo método)
$routeFound = false;
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

foreach ($routes as $route => $routeData) {
    foreach ($wildcards as $wildcard => $pattern) {
        $route = str_replace($wildcard, $pattern, $route);
    }

    $pattern = str_replace('/', '\/', ltrim($route, '/'));

    if (preg_match("/^{$pattern}$/", trim($requestUri, '/')) && $routeData['method'] === $requestMethod) {
        $routeFound = true;
        list($controllerName, $controllerMethod) = explode('@', $routeData['controller']);
        break;
    }
}

// Extrai Parâmetros da URI (corrigido para usar $requestUri)
$explodeUri = explode('/', ltrim($requestUri, '/'));
$explodeWildcard = explode('/', ltrim($requestUri, '/')); // Use $requestUri
$arrayDiff = array_diff($explodeUri, $explodeWildcard);

$params = [];
foreach ($arrayDiff as $index => $uri) {
    $params[$explodeUri[$index - 1]] = is_numeric($uri) ? (int)$uri : $uri;
}

if ($routeFound) {
    // Verifica se a rota começa com '/admin'
    $isAdminRoute = str_starts_with($requestUri, '/admin');

    // Escolhe a conexão correta
    $conexao = $isAdminRoute ? $adminConexao : $clienteConexao;

    // Instancia o controlador, injetando a conexão escolhida
    $controller = new $controllerName($conexao);

    // Chama o método do controlador com os parâmetros
    try {
        $controller->$controllerMethod($params);
    } catch (Exception $e) {
        http_response_code(500);
        echo "Erro interno no servidor";
        error_log($e->getMessage()); // Loga o erro
    }
} else {
    $routeExists = false;
    foreach ($routes as $route => $routeData) {
        $pattern = str_replace('/', '\/', ltrim($route, '/'));
        if (preg_match("/^{$pattern}$/", trim($requestUri, '/'))) {
            $routeExists = true;
            break;
        }
    }

    if ($routeExists) {
        http_response_code(405); // Método Não Permitido
        echo "Método não permitido para esta rota";
    } else {
        http_response_code(404); // Não Encontrado
        echo "Página não encontrada";
    }
}
