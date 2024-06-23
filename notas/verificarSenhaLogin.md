
SQL
CREATE OR REPLACE FUNCTION autenticar_usuario(
p_username TEXT,
p_password TEXT
) RETURNS BOOLEAN AS $$
DECLARE
v_hash TEXT;
BEGIN
SELECT pe_senha INTO v_hash
FROM pessoa
WHERE pe_username = p_username;

IF v_hash IS NULL THEN
RETURN FALSE; -- Usuário não encontrado
    END IF;

RETURN password_verify(p_password, v_hash); -- Verifica a senha
END;
$$ LANGUAGE plpgsql;



Explicação:

Declaração da função: CREATE OR REPLACE FUNCTION autenticar_usuario cria ou substitui a função. Ela recebe o nome de usuário e a senha como parâmetros de texto (TEXT) e retorna um valor booleano (BOOLEAN).
Declaração de variável: v_hash TEXT declara uma variável para armazenar o hash da senha obtido do banco de dados.
Consulta SQL: SELECT pe_senha INTO v_hash FROM pessoa WHERE pe_username = p_username; busca o hash da senha do usuário na tabela pessoa com base no nome de usuário fornecido.
Verificação de usuário: IF v_hash IS NULL THEN RETURN FALSE; verifica se o hash foi encontrado. Se não for (ou seja, o usuário não existe), a função retorna FALSE.
Verificação de senha: RETURN password_verify(p_password, v_hash); verifica a senha usando a função password_verify, que compara a senha em texto plano com o hash armazenado. Se a senha for válida, retorna TRUE; caso contrário, retorna FALSE.