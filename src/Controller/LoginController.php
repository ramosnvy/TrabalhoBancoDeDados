<?php

namespace Pedro\TrabalhoBancoDeDados\Controller;

use Pedro\TrabalhoBancoDeDados\Model\DB;
use Pedro\TrabalhoBancoDeDados\Model\Usuario;
use PgSql\Connection;

class LoginController
{
    private  Usuario $usuarioModel;

    public function __construct($conexao)
    {
        $this->usuarioModel = new Usuario($conexao); // Passa a conexão para o UsuarioModel

    }
    public function indexAdmin()
    {
        require_once __DIR__ . '/../view/Admin/login.php';
    }

    public function indexCliente()
    {
        require_once __DIR__ . '/../view/login.php';
    }

    public function autenticar()
    {
        if($_SESSION["usuario_autenticado"] == false){
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                echo "Preencha todos os campos!";
                return;
            }

            try {
                $usuario = $this->usuarioModel->autenticarUsernameSenha($username, $password); // Chama o método do UsuarioModel
                var_dump($usuario);
                if ($usuario) {
                    session_start();
                    $_SESSION['usuario_id'] = $usuario['pe_codigo']; // Use o nome correto da coluna de ID
                    $_SESSION['usuario_autenticado'] = true;
                    header('Location: /admin/dashboard');
                    exit;
                } else {
                    echo "Usuário ou senha incorretos!";
                }
            } catch (\Exception $e) {
                echo "Erro na autenticação: " . $e->getMessage();
            }
        }else{
            header('Location: /admin/dashboard');
        }

    }
    public function sair()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /login');
        exit;
    }

}
