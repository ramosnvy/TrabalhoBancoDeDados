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

CREATE VIEW vw_vendasinfo AS
SELECT COUNT(*) as qtdVendas
FROM tb_vendas
WHERE ven_horario >= CURRENT_DATE - INTERVAL '30 days';

CREATE VIEW vw_vendas_recentes AS
SELECT
    ven.ven_codigo,
    ven.ven_horario,
    ven.ven_valor_total,
    COALESCE(fun.pe_nome, 'NÃO INFORMADO') AS nome_funcionario,
    COALESCE(cli.pe_nome, 'NÃO INFORMADO') AS nome_cliente
FROM
    tb_vendas AS ven
        LEFT JOIN
    tb_itens AS ite ON ven.ven_codigo = ite.ven_codigo
        LEFT JOIN
    tb_produtos AS pro ON ite.pro_codigo = pro.pro_codigo
        LEFT JOIN
    tb_pessoas AS cli ON ven.pe_codigo = cli.pe_codigo
        LEFT JOIN
    tb_pessoas AS fun ON ven.fun_codigo = fun.pe_codigo
WHERE
    ven_horario >= CURRENT_DATE - INTERVAL '30 days';
