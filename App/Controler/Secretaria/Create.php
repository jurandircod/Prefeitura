<?php

require_once '../../../vendor/autoload.php';

use App\Model\Secretaria\Secretaria;
use App\Model\Secretaria\SecretariaDao;

class ControlerSecretaria
{
    private $id;
    private $nome;
    private $error;

    public function __construct($arrayPost)
    {
        // Usando $arrayPost passado para o construtor
        $this->id = $arrayPost['secretariaId'];
        $this->nome = $arrayPost['secretariaNome'];
       
    }

    public function create(Secretaria $secretaria, SecretariaDao $secretariaDao)
    {
            $secretaria->setNome($this->nome);
            $secretariaDao->create($secretaria);
            // Redirecionamento para uma rota dentro do servidor
            header("Location: /prefeitura");
            exit; // Termina o script após o redirecionamento   
            $this->error = "Nome e setor não podem ser vazios";
        
    }
}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerSecretaria($_POST);
    $secretaria = new Secretaria();
    $secretariaDao = new SecretariaDao();
    $controller->create($secretaria, $secretariaDao);
}

