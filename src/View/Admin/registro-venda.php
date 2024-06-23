<div class="container mt-4">
    <h2>Registro de Venda</h2>

    <form method="POST" action="/dashboard/registrar/venda/salvar">
        <div class="mb-3">
            <label for="valorTotal" class="form-label">Valor Total:</label>
            <input type="number" class="form-control" value="valorTotal" id="valorTotal" name="valorTotal" required>
        </div>
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente:</label>
            <select class="form-select" id="cliente" name="cliente" required>
                <?php foreach ($clientes as $cliente) : ?>
                    <option value="<?= $cliente['pe_codigo'] ?>"><?= $cliente['pe_nome'] ?></option>
                <?php endforeach; ?>            </select>
        </div>
        <div class="mb-3">
            <label for="funcionario" class="form-label">Funcionário Responsável:</label>
            <select class="form-select" id="funcionario" name="funcionario" required>
                <?php foreach ($funcionarios as $funcionario) : ?>
                    <option value="<?= $funcionario['pe_codigo'] ?>"><?= $funcionario['pe_nome'] ?></option>
                <?php endforeach; ?>
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
                    <select class="form-select" id="pro_descricao" name="pro_descricao" required>
                        <?php foreach ($produtos as $produto) : ?>
                            <option value="<?= $produto['pro_codigo'] ?>"><?= $produto['pro_descricao'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>

                <?php foreach ($produtos as $produto) : ?>
                    <td>
                        <input type="hidden" value="<?= $produto['pro_quantidade'] ?>">
                        <input id="quantidade" type="number" name="pro_quantidade" value="<?= $produto['pro_quantidade'] ?>" class="form-control quantidade-produto">
                    </td>
                    <td><input type="number" name="valor_unitario" value="<?= $produto['pro_valor'] ?>" class="form-control" readonly></td>
                    <td><input type="number" name="valor_total_mercadoria" value="<?= $produto['pro_quantidade'] * $produto['pro_valor'] ?>" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger">Remover</button></td>
                <?php endforeach; ?>
            </tr>

            </tbody>
        </table>
        <!--<button type="button" class="btn btn-secondary" id="adicionarItem">Adicionar Item</button>-->
        <button type="submit" class="btn btn-primary" >Registrar Venda</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quantidadeInputs = document.querySelectorAll('.quantidade-produto');
        const valorTotalInput = document.getElementById('valorTotal');

        // Função para calcular o total do produto
        function calcularTotal(quantidadeInput) {
            const quantidade = parseInt(quantidadeInput.value);
            const quantidadeOriginal = parseInt(quantidadeInput.previousElementSibling.value); // Quantidade original do produto
            const precoUnitario = parseFloat(quantidadeInput.parentElement.nextElementSibling.children[0].value);

            // Validação da quantidade
            if (quantidade < 0 || quantidade > quantidadeOriginal) {
                alert(`A quantidade deve ser um valor entre 0 e ${quantidadeOriginal}`);
                quantidadeInput.value = quantidadeOriginal; // Define o valor máximo permitido
                return null; // Retorna null se a quantidade for inválida
            }

            // Calcula o total do produto
            const totalProduto = quantidade * precoUnitario;
            return totalProduto.toFixed(2); // Retorna o total formatado para duas casas decimais
        }

        // Adiciona ouvinte de eventos para cada campo de quantidade
        quantidadeInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                // Calcula o total do produto
                const totalProduto = calcularTotal(this);
                if (totalProduto !== null) {
                    this.parentElement.nextElementSibling.nextElementSibling.children[0].value = totalProduto; // Atualiza o campo Total
                }

                // Calcula o novo valor total da venda
                atualizarValorTotal();
            });
        });

        // Adiciona ouvinte de eventos para cada campo de total-valor
        document.querySelectorAll('.total-produto').forEach(function(total) {
            total.addEventListener('input', function() {
                atualizarValorTotal();
            });
        });

        // Função para atualizar o campo valorTotal
        function atualizarValorTotal() {
            let novoValorTotal = 0;
            document.querySelectorAll('.total-produto').forEach(function(total) {
                novoValorTotal += parseFloat(total.value);
            });
            valorTotalInput.value = novoValorTotal.toFixed(2);
        }
    });
</script>
</body>
</html>
