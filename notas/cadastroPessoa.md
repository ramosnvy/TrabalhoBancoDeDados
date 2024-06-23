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
-- Insere a nova pessoa na tabela
INSERT INTO tb_pessoas (pe_nome, pe_senha, pe_cpf, pe_usuario, pe_flagtipopessoa)
VALUES (p_nome, p_senha, p_cpf, p_usuario, p_flagtipopessoa)
RETURNING pe_codigo INTO v_pe_codigo;

Retorna o código da pessoa cadastrada
    RETURN v_pe_codigo;
END;
$$ LANGUAGE plpgsql;
