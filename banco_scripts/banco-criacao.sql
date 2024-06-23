CREATE TABLE tb_pessoas(
                           pe_codigo BIGINT NOT NULL PRIMARY KEY,
                           pe_nome varchar(45),
                           pe_senha varchar(50),
                           pe_cpf varchar(50),
                           pe_usuario varchar(45),
                           pe_flagtipopessoa varchar(1)
)

CREATE TABLE tb_cliente(
cli_codigo BIGINT NOT NULL PRIMARY KEY,
pe_codigo BIGINT NOT NULL,
FOREIGN KEY (pe_codigo) REFERENCES tb_pessoas (pe_codigo)
)


CREATE TABLE tb_funcionarios (
fun_codigo BIGINT NOT NULL PRIMARY KEY,
pe_codigo BIGINT NOT NULL,
fun_funcao varchar(50),
FOREIGN KEY (pe_codigo) REFERENCES tb_pessoas (pe_codigo)
)

CREATE TABLE tb_vendas(
ven_codigo BIGINT NOT NULL PRIMARY KEY,
ven_horario TIMESTAMP DEFAULT NOW(),
ven_valor_total DECIMAL(7,2),
fun_codigo BIGINT NOT NULL,
FOREIGN KEY (fun_codigo) REFERENCES tb_funcionarios (fun_codigo)
)

ALTER TABLE tb_vendas ADD COLUMN pe_codigo BIGINT REFERENCES tb_pessoas (pe_codigo);


CREATE TABLE tb_itens (
ite_codigo BIGINT NOT NULL PRIMARY KEY,
ite_quantidade INT,
ite_valor_parcial DECIMAL(7,2),
pro_codigo BIGINT NOT NULL,
ven_codigo BIGINT NOT NULL,
FOREIGN KEY (pro_codigo) REFERENCES tb_produtos (pro_codigo),
FOREIGN KEY (ven_codigo) REFERENCES tb_vendas (ven_codigo)
)

CREATE TABLE tb_fornecedores(
for_codigo BIGINT NOT NULL PRIMARY KEY,
for_descricao varchar(45)
)

CREATE TABLE tb_produtos(
pro_codigo BIGINT NOT NULL PRIMARY KEY,
pro_descricao VARCHAR(50),
pro_valor DECIMAL(7,2),
pro_quantidade INT,
for_codigo BIGINT NOT NULL,
FOREIGN KEY (for_codigo) REFERENCES tb_fornecedores (for_codigo)
)

-- SEQ's
CREATE SEQUENCE seq_pe_codigo;

ALTER TABLE tb_pessoas
    ALTER COLUMN pe_codigo SET DEFAULT nextval('seq_pe_codigo');

CREATE SEQUENCE seq_ven_codigo;

ALTER TABLE tb_vendas
    ALTER COLUMN ven_codigo SET DEFAULT nextval('seq_ven_codigo');

CREATE SEQUENCE seq_fun_codigo;

ALTER TABLE tb_funcionarios
    ALTER COLUMN fun_codigo SET DEFAULT nextval('seq_fun_codigo');

CREATE SEQUENCE seq_pro_codigo;

ALTER TABLE tb_produtos
    ALTER COLUMN pro_codigo SET DEFAULT nextval('seq_pro_codigo');

CREATE SEQUENCE seq_for_codigo;

ALTER TABLE tb_fornecedores
    ALTER COLUMN for_codigo SET DEFAULT nextval('seq_for_codigo');

CREATE SEQUENCE seq_ite_codigo;

ALTER TABLE tb_itens
    ALTER COLUMN ite_codigo SET DEFAULT nextval('seq_ite_codigo');

CREATE SEQUENCE seq_cli_codigo;

ALTER TABLE tb_cliente
    ALTER COLUMN cli_codigo SET DEFAULT nextval('seq_cli_codigo');

