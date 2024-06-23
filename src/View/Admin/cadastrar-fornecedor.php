<div class="container mt-4">
    <h2>Cadastro de Fornecedor</h2>

    <form method="POST" action="/admin/dashboard/cadastrar/fornecedor/salvar">
        <div class="mb-3">
            <label for="nomeFornecedor" class="form-label">Nome do Fornecedor:</label>
            <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Fornecedor</button>
    </form>
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        <?php
        session_start(); // Inicia a sessão
        if (isset($_SESSION['alerta']) && $_SESSION['alerta'] != null){
            $mensagem = $_SESSION['alerta'];
            unset($_SESSION['alerta']); // Limpa a mensagem da sessão
            echo "alert('$mensagem');";
        }
        ?>
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
