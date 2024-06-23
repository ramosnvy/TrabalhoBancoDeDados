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

    private $conexao; // Armazena a conexão estabelecida

    public function criarConexao()
    {
        if ($this->conexao) {
            return $this->conexao; // Retorna a conexão existente se já estiver aberta
        }

        $dsn = "host={$this->server} port={$this->porta} dbname={$this->nome} user={$this->usuario} password={$this->senha}";

        try {
            $this->conexao = pg_connect($dsn);

            if (!$this->conexao) {
                throw new \Exception("Erro ao conectar ao banco de dados: " . pg_last_error());
            }

            return $this->conexao;
        } catch (\Exception $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function gerarBackup() {

        exec('C:\Windows\System32\cmd.exe /c START C:\bd\TrabalhoBancoDeDados\src\System\pgbackup.bat');
        header('Location: /dashboard/sistema');
    }


}