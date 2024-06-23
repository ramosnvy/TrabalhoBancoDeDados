<div class="container mt-4">
    <h2>Cadastro de Mercadoria</h2>

    <form method="POST" action="/admin/dashboard/cadastrar/produto/salvar">
        <div class="mb-3">
            <label for="fornecedor" class="form-label">Fornecedor:</label>
            <select class="form-select" id="fornecedor" name="fornecedor" required>
                <?php foreach ($fornecedores as $fornecedor) : ?>
                <option value="<?= $fornecedor['for_codigo'] ?>"><?= $fornecedor['for_descricao'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" required step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Mercadoria</button>
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
