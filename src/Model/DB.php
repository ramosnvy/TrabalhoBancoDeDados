<?php

namespace Model;

use PgSql\Connection;

class DB
{
    public String $server = "localhost";
    public String $usuario = "postgres";
    public String $senha = "postgres";
    public String $nome = "trabalho2";
    public String $porta = "5432";

    public function criarConexao()
    {
        phpinfo();
    }
}