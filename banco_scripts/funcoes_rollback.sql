--funcao que testa rollback no corpo dela mesma
CREATE OR REPLACE FUNCTION RollbackTest()
returns VOID AS $$
BEGIN
     EXECUTE 'insert into tb_fornecedores values (11, ''Fornecedora X'');';
    EXECUTE 'insert into tb_produtos values (26, ''Elástico'', 6, 20, 8);';
    EXECUTE 'insert into tb_pessoas values (5001, ''123123'', ''123.456.678-90'');';

    RAISE EXCEPTION 'Rollback realizado!';

END;
$$ LANGUAGE plpgsql;


--funcao que verifica se os dados estao corretos, e caso nao estejam, dá um rollback, se estiverem, ela finaliza e "commit"
CREATE OR REPLACE FUNCTION inserir_cliente(
    p_cli_codigo BIGINT,
    p_pe_codigo BIGINT
)
RETURNS VOID AS $$
BEGIN
    -- Verifica se a pessoa existe na tabela tb_pessoas
    IF EXISTS (SELECT 1 FROM tb_pessoas WHERE pe_codigo = p_pe_codigo) THEN
        -- Se existe, realiza a inserção na tabela tb_cliente
        INSERT INTO tb_cliente (cli_codigo, pe_codigo)
        VALUES (p_cli_codigo, p_pe_codigo);
        
        -- Não é necessário COMMIT aqui, a transação será confirmada automaticamente
    ELSE
        -- Se a pessoa não existe, lança uma exceção que causa rollback
        RAISE EXCEPTION 'Pessoa não encontrada! rollback realizado';
    END IF;
END;
$$ LANGUAGE plpgsql;







