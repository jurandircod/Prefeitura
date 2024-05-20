<?php

require_once '../../../vendor/autoload.php';

use App\Model\Usuario\Usuario;
use App\Model\Usuario\UsuarioDao;

class ControlerUsuario
{
    private $id;
    private $nome;
    private $senha;
    private $error;

    public function __construct($arrayPost)
    {
        // Usando $arrayPost passado para o construtor
        $this->id = $arrayPost['usuarioId'];
        $this->nome = $arrayPost['usuarioNome'];
        $this->senha = $arrayPost['usuarioSenha'];
    }

    public function create(Usuario $usuario, UsuarioDao $usuarioDao)
    {
            $usuario->setNome($this->nome);
            $usuario->setSenha($this->senha);
            $usuarioDao->create($usuario);
            // Redirecionamento para uma rota dentro do servidor            
            header("Location: /prefeitura");
            exit; // Termina o script após o redirecionamento   
            $this->error = "Nome e setor não podem ser vazios";
        
    }

    public function logar(Usuario $usuario, UsuarioDao $usuarioDao)
    {
            $usuario->setNome($this->nome);
            $usuario->setSenha($this->senha);
            $result = $usuarioDao->logar($usuario);
            
        if($result == false){
            header("Location: /prefeitura/login.php?i=1");
        }else{
            header("Location: /prefeitura");
        }
            // Redirecionamento para uma rota dentro do servidor            
            
            exit; // Termina o script após o redirecionamento   
            $this->error = "Nome e setor não podem ser vazios";
        
    }
}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerUsuario($_POST);
    $usuario = new Usuario();
    $usuarioDao = new UsuarioDao();
    $controller->create($usuario, $usuarioDao);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $controller = new ControlerUsuario($_GET);
    $usuario = new Usuario();
    $usuarioDao = new UsuarioDao();
    $controller->logar($usuario, $usuarioDao);
}



