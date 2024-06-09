<?php

namespace Pedro\TrabalhoBancoDeDados\Model;

use PgSql\Connection;

class DB
{
    public String $server = "localhost";
    public String $usuario = "postgres";
    public String $senha = "100803";
    public String $nome = "trabalho2";
    public String $porta = "5432";

    public function criarConexao()
    {
        $conexao = pg_connect("host=$this->server port=$this->porta dbname=$this->nome user=$this->usuario password=$this->senha");

        if (!$conexao) {
            echo "Erro ao conectar ao banco de dados.";
            exit;
        }

        return $conexao;
    }

}