
--criando roles (vendedor, administrador e cliente)
CREATE ROLE vendedor;
CREATE ROLE administrador;
CREATE ROLE cliente;

--Dando permissoes diferentes pra cada role
GRANT INSERT, SELECT ON tb_itens, tb_vendas TO vendedor;
GRANT SELECT ON tb_produtos TO vendedor;

GRANT INSERT, SELECT ON TB_ITENS, TB_VENDAS, TB_PRODUTOS, TB_FUNCIONARIOS, TB_FORNECEDORES TO administrador;

GRANT SELECT ON TB_PRODUTOS TO cliente;

--criando users, 1 admin e 2 vendedores
CREATE USER ADM1 WITH PASSWORD 'admin';
CREATE USER RicardoVendas WITH PASSWORD 'vendas';
CREATE USER JoaoVendas WITH PASSWORD 'vendas';

--atribuindo a role administrador pro adm1
GRANT administrador to ADM1

--role vendedor pro RicardoVendas
grant vendedor to RicardoVendas
--role vendedor pro JoaoVendas
grant vendedor to JoaoVendas


--dando permissao de insert nos produtos pro ricardo vendas
grant insert on tb_produtos to RicardoVendas

--os testes dos privilegios estao no relatorio




