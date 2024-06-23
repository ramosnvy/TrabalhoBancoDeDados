<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

class Usuario
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function autenticarUsernameSenha($username, $password)
    {
        $result = pg_query_params($this->conexao, "SELECT autenticar_usuario($1, $2)", array($username, $password));

        if ($result && pg_num_rows($result) > 0) {
            $usuario = pg_fetch_assoc($result); // Obtém os dados do usuário

            if($usuario["autenticar_usuario"] == 't'){
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
}