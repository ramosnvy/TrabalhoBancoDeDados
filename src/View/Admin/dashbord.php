
<!-- Conteúdo da página -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Dashboard</h2>

    <!-- Botões de Cadastro -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between">
            <a href="/dashboard/cadastrar/pessoa" class="btn btn-primary flex-fill me-2">Cadastro de Pessoa</a>
            <a href="/dashboard/registrar/venda" class="btn btn-primary flex-fill me-2">Registro de Venda</a>
            <a href="/dashboard/cadastrar/fornecedor" class="btn btn-primary flex-fill me-2">Cadastro de Fornecedores</a>
            <a href="/dashboard/cadastrar/mercadoria" class="btn btn-primary flex-fill">Cadastro de Mercadorias</a>
        </div>
    </div>
    <!-- Fim dos Botões de Cadastro -->

    <!-- Cards de Informações -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Vendas Mensais</h5>
                    <p class="card-text">Total de vendas no mês: 100</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Clientes Ativos</h5>
                    <p class="card-text">Total de clientes ativos: 50</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Pedidos Pendentes</h5>
                    <p class="card-text">Total de pedidos pendentes: 10</p>
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
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Dados de exemplo (substitua por seus dados reais)
            $dadosVendas = array(

                array('015', '10:20', 'R$ 580,00', 'Cliente O', 'Funcionário L')
            );

            // Parâmetros da paginação
            $itensPorPagina = 10;
            $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $inicio = ($paginaAtual - 1) * $itensPorPagina;
            $totalPaginas = ceil(count($dadosVendas) / $itensPorPagina);

            // Exibir os itens da página atual
            for ($i = $inicio; $i < min($inicio + $itensPorPagina, count($dadosVendas)); $i++) {
                echo '<tr>';
                echo '<td>' . $dadosVendas[$i][0] . '</td>';
                echo '<td>' . $dadosVendas[$i][1] . '</td>';
                echo '<td>' . $dadosVendas[$i][2] . '</td>';
                echo '<td>' . $dadosVendas[$i][3] . '</td>';
                echo '<td>' . $dadosVendas[$i][4] . '</td>';
                echo '<td>';
                echo '<button class="btn btn-danger btn-sm">Excluir</button>';
                echo '<button class="btn btn-info btn-sm ms-1">Detalhes</button>';
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

