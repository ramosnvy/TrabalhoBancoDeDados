<div class="container mt-4">
    <h2>Cadastro de Pessoa</h2>

    <form method="POST" action="/admin/dashboard/cadastrar/pessoa/salvar">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <select class="form-select" id="tipo" name="tipo" required>
                <option value="">Selecione</option>
                <option value="C">Cliente</option>
                <option value="F">Funcionário</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
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
