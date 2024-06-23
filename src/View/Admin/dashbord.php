<!-- Conteúdo da página -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Dashboard</h2>

    <!-- Botões de Cadastro -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between">
            <a href="/admin/dashboard/cadastrar/pessoa" class="btn btn-primary flex-fill me-2">Cadastro de Pessoa</a>
            <a href="/admin/dashboard/registrar/venda" class="btn btn-primary flex-fill me-2">Registro de Venda</a>
            <a href="/admin/dashboard/cadastrar/fornecedor" class="btn btn-primary flex-fill me-2">Cadastro de Fornecedores</a>
            <a href="/admin/dashboard/cadastrar/produto" class="btn btn-primary flex-fill">Cadastro de Mercadorias</a>
        </div>
    </div>
    <!-- Fim dos Botões de Cadastro -->

    <!-- Cards de Informações -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Vendas (30 dias)</h5>
                    <p class="card-text">Total de vendas: <?=$vendaInfo[0]["qtdvendas"]; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Total de clientes: <?=$clienteInfo[0]["qtdclientes"]; ?></p>
                </div>
            </div>
        </div>

        <!-- Fim dos Cards de Informações -->
    </div>

    <!-- Tabela de Vendas -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Código da Venda</th>
                <th scope="col">Horário</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Cliente</th>
                <th scope="col">Funcionário Responsável</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Dados de exemplo (substitua por seus dados reais)
            $dadosVendas = $vendasRecentes;

            // Parâmetros da paginação
            $itensPorPagina = 10;
            $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $inicio = ($paginaAtual - 1) * $itensPorPagina;
            $totalPaginas = ceil(count($dadosVendas) / $itensPorPagina);

            // Exibir os itens da página atual
            for ($i = $inicio; $i < min($inicio + $itensPorPagina, count($dadosVendas)); $i++) {
                echo '<tr>';
                echo '<td>' . $dadosVendas[$i]['ven_codigo'] . '</td>';
                echo '<td>' . $dadosVendas[$i]['ven_horario'] . '</td>';
                echo '<td>' . $dadosVendas[$i]['ven_valor_total'] . '</td>';
                echo '<td>' . $dadosVendas[$i]['nome_funcionario'] . '</td>';
                echo '<td>' . $dadosVendas[$i]['nome_cliente'] . '</td>';
                echo '<td>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

        <!-- Paginação -->
        <nav aria-label="Paginação">
            <ul class="pagination justify-content-center">
                <?php
                // Exibir links da paginação
                for ($pagina = 1; $pagina <= $totalPaginas; $pagina++) {
                    echo '<li class="page-item ' . ($pagina == $paginaAtual ? 'active' : '') . '">';
                    echo '<a class="page-link" href="?pagina=' . $pagina . '">' . $pagina . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>
        <!-- Fim da Paginação -->
    </div>
    <!-- Fim da Tabela de Vendas -->
</div>
<!-- JavaScript do Bootstrap (opcional para funcionalidades como collapsible navbar) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

