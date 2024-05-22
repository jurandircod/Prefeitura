<?php

require_once '../../../vendor/autoload.php';

use App\Model\Secretaria\Secretaria;
use App\Model\Secretaria\SecretariaDao;

class ControlerSecretaria
{
    private $id;
    private $nome;
    

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
            header("Location: /prefeitura/index.php?p=secretaria&status=1");
            exit; // Termina o script após o redirecionamento   
        
    }

    public function update(Secretaria $secretaria, SecretariaDao $secretariaDao, $id)
    {
        $secretaria->setId($id);
        $secretaria->setNome($this->nome);
        $secretariaDao->update($secretaria);
        header("Location: /prefeitura/index.php?p=secretaria&status=2");
        exit;
    }

    public function delete(Secretaria $secretaria, SecretariaDao $secretariaDao, $id)
    {
        $secretaria->setId($id);
        $secretariaDao->delete($secretaria->getId());
        header("Location: /prefeitura/index.php?p=secretaria&status=4");
        exit;
    }
}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerSecretaria($_POST);
    $secretaria = new Secretaria();
    $secretariaDao = new SecretariaDao();
    $controller->create($secretaria, $secretariaDao);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['idDelete'])) {
        $controller = new ControlerSecretaria($_GET);
        $secretaria = new Secretaria();
        $secretariaDao = new SecretariaDao();
        $idDelete = $_GET['idDelete'];
        $controller->delete($secretaria, $secretariaDao, $idDelete);
    } elseif (isset($_GET['idUpdate'])) {
        $controller = new ControlerSecretaria($_GET);
        $secretaria = new Secretaria();
        $secretariaDao = new SecretariaDao();
        $idUpdate = $_GET['idUpdate'];
        $controller->update($secretaria, $secretariaDao, $idUpdate);
    }
}

