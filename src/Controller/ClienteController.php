<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use PgSql\Connection;

class ClienteController
{
    public Int $cli_codigo;
    public Int $pe_codigo;
    public Connection $conexao;

    public function __construct(Connection $conexao)
    {
        $this->conexao = $conexao;
    }

    public function getClientes(): array
    {
        $result = pg_query($this->conexao, "SELECT * FROM vw_clientes");
        $clientes = []; // Inicializa um array vazio para armazenar os clientes

        while ($row = pg_fetch_assoc($result)) {
            $clientes[] = $row; // Adiciona a linha atual ao array
        }

        return $clientes;
    }


}