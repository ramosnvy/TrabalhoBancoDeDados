<div class="container mt-4">
    <h2>Registro de Venda</h2>

    <form>
        <div class="mb-3">
            <label for="valorTotal" class="form-label">Valor Total:</label>
            <input type="number" class="form-control" id="valorTotal" name="valorTotal" required>
        </div>
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente:</label>
            <select class="form-select" id="cliente" name="cliente" required>
                <option value="">Selecione</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="funcionario" class="form-label">Funcionário Responsável:</label>
            <select class="form-select" id="funcionario" name="funcionario" required>
                <option value="">Selecione</option>
            </select>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="input-group">
                        <input type="text" class="form-control" id="produto" placeholder="Pesquisar Produto" aria-label="Pesquisar Produto">
                        <button class="btn btn-outline-secondary" type="button" id="adicionarProduto"><i class="bi bi-plus-circle"></i></button>
                    </div>
                </td>
                <td><input type="number" class="form-control"></td>
                <td><input type="number" class="form-control"></td>
                <td><input type="number" class="form-control" readonly></td>
                <td><button type="button" class="btn btn-danger">Remover</button></td>
            </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-secondary" id="adicionarItem">Adicionar Item</button>
        <button type="submit" class="btn btn-primary">Registrar Venda</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('adicionarItem').addEventListener('click', function() {
        // Lógica para adicionar uma nova linha à tabela
    });
</script>
</body>
</html>
