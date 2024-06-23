CREATE VIEW vw_clientes AS
SELECT pe_codigo, pe_nome
FROM tb_pessoas
WHERE pe_flagtipopessoa = 'C';

CREATE VIEW vw_funcionarios AS
SELECT fun.pe_codigo, pe.pe_nome
FROM tb_pessoas as pe
         JOIN tb_funcionarios as fun ON (pe.pe_codigo = fun.pe_codigo)
WHERE pe_flagtipopessoa = 'F';

CREATE VIEW vw_produtos AS
SELECT pro_codigo, pro_descricao, pro_valor, pro_quantidade
FROM tb_produtos
WHERE pro_quantidade > 0;

CREATE VIEW vw_fornecedores AS
SELECT for_codigo, for_descricao
FROM tb_fornecedores;