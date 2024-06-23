
<!-- Conteúdo da página -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Sistema</h2>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary btn-lg" id="btnBackup" onclick="gerarBackup()">Gerar Backup do Banco de Dados</button>
            </div>
        </div>
    </div>
</div>

<script>
    function gerarBackup() {
        window.location.href = "/dashboard/sistema/gerarbackup";
    }
</script>

<!-- JavaScript do Bootstrap (opcional para funcionalidades como collapsible navbar) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript do Bootstrap (opcional para funcionalidades como collapsible navbar) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
