CREATE OR REPLACE FUNCTION cadastrar_pessoa(
p_nome VARCHAR(45),
p_senha VARCHAR(50),
p_cpf VARCHAR(50),
p_usuario VARCHAR(45),
p_flagtipopessoa VARCHAR(1)
) RETURNS bigint AS $$
DECLARE
v_pe_codigo bigint;
BEGIN
INSERT INTO tb_pessoas (pe_nome, pe_senha, pe_cpf, pe_usuario, pe_flagtipopessoa)
VALUES (p_nome, p_senha, p_cpf, p_usuario, p_flagtipopessoa)
    RETURNING pe_codigo INTO v_pe_codigo;

Retorna o código da pessoa cadastrada
    RETURN v_pe_codigo;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION autenticar_usuario(p_usuario TEXT, p_senha TEXT)
RETURNS BOOLEAN AS $$
BEGIN
    -- Consulta para obter a senha em texto plano
RETURN EXISTS (
    SELECT 1
    FROM tb_pessoas
    WHERE pe_usuario = p_usuario AND pe_senha = p_senha
);
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION inserir_venda(
    p_ven_valor_total NUMERIC,
    p_fun_codigo BIGINT,
    p_pe_codigo BIGINT
) RETURNS VOID AS $$
BEGIN
INSERT INTO tb_vendas (ven_valor_total, fun_codigo, pe_codigo)
VALUES (p_ven_valor_total, p_fun_codigo, p_pe_codigo);
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION cadastrar_fornecedor(for_descricao TEXT)
RETURNS VOID AS $$
BEGIN
INSERT INTO tb_fornecedores (for_descricao)
VALUES (for_descricao);
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION cadastrar_produto(
    pro_descricao TEXT,
    pro_valor NUMERIC,
    pro_quantidade INTEGER,
    for_codigo INTEGER
) RETURNS VOID AS $$
BEGIN
INSERT INTO tb_produtos (pro_descricao, pro_valor, pro_quantidade, for_codigo)
VALUES (pro_descricao, pro_valor, pro_quantidade, for_codigo);
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION getUltimoIdVenda() RETURNS INTEGER AS $$
DECLARE
ultimo_id INTEGER;
BEGIN
SELECT ven_codigo INTO ultimo_id
FROM tb_vendas
ORDER BY ven_codigo DESC
    LIMIT 1;
IF NOT FOUND THEN
    RETURN 0;
END IF;

RETURN ultimo_id;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION inserir_item(
    p_ite_quantidade INTEGER,
    p_ite_valor_parcial NUMERIC, 
    p_pro_codigo INTEGER,
    p_ven_codigo INTEGER
) RETURNS VOID AS $$
BEGIN
INSERT INTO tb_itens (ite_quantidade, ite_valor_parcial, pro_codigo, ven_codigo)
VALUES (p_ite_quantidade, p_ite_valor_parcial, p_pro_codigo, p_ven_codigo);
END;
$$ LANGUAGE plpgsql;


