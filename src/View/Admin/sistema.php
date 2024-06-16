
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Meu Painel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Sistema</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo da página -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Sistema</h2>

    <!-- Botão de Backup -->
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" id="btnBackup">Gerar Backup do Banco de Dados</button>
            </div>
        </div>
    </div>
    <!-- Fim do Botão de Backup -->
</div>

<!-- JavaScript do Bootstrap (opcional para funcionalidades como collapsible navbar) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para tratar o clique no botão de backup -->
<script>
    document.getElementById('btnBackup').addEventListener('click', function() {
        // Aqui você pode adicionar a lógica para gerar o backup do banco de dados
        alert('Backup do banco de dados gerado com sucesso!');
        // Exemplo fictício: redirecionar para uma página que gera o backup
        window.location.href = 'gerar_backup.php';
    });
</script>

