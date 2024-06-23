CREATE OR REPLACE FUNCTION inserir_funcionario()
RETURNS TRIGGER AS $$
BEGIN
    -- Verifica se a pessoa inserida é do tipo 'F' (Física)
    IF NEW.pe_flagtipopessoa = 'F' THEN
        INSERT INTO tb_funcionarios (pe_codigo, fun_funcao)
        VALUES (NEW.pe_codigo, 'Vendedor'); -- Substitua 'Função Padrão' pela função desejada

END IF;

RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Criação da trigger que será disparada após inserção na tb_pessoas
CREATE TRIGGER trigger_inserir_funcionario
    AFTER INSERT ON tb_pessoas
    FOR EACH ROW
    EXECUTE FUNCTION inserir_funcionario();



------------------------------------------




CREATE OR REPLACE FUNCTION inserir_cliente()
RETURNS TRIGGER AS $$
BEGIN
    -- Verifica se a pessoa inserida é do tipo 'C' (Cliente)
    IF NEW.pe_flagtipopessoa = 'C' THEN
        INSERT INTO tb_cliente (pe_codigo)
        VALUES (NEW.pe_codigo); -- Substitua 'Função Padrão' pela função desejada

END IF;

RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Criação da trigger que será disparada após inserção na tb_pessoas
CREATE TRIGGER trigger_inserir_cliente
    AFTER INSERT ON tb_pessoas
    FOR EACH ROW
    EXECUTE FUNCTION inserir_cliente();



