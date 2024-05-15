<?php

require_once '../../../vendor/autoload.php';

use App\Model\RamaisEx\RamaisExDao;
use App\Model\RamaisEx\RamaisEx;

class ControlerRamaisEx
{
    private $id;
    private $nome;
    private $numero;
    private $setor;
    private $error;

    public function __construct($arrayPost)
    {
        // Usando $arrayPost passado para o construtor
        $this->id = $arrayPost['ramaisExId'];
        $this->nome = $arrayPost['ramaisExNome'];
        $this->numero = $arrayPost['ramaisExNumero'];
        $this->setor = $arrayPost['ramaisExSetor'];
    }

    public function create(RamaisEx $ramaisEx, RamaisExDao $ramaisExDao)
    {

        
            $ramaisEx->setNome($this->nome);
            $ramaisEx->setNumero($this->numero);
            $ramaisEx->setSetor($this->setor);
            $ramaisExDao->create($ramaisEx);
            // Redirecionamento para uma rota dentro do servidor
            header("Location: /prefeitura/index.php?p=ramaisEx");
            exit; // Termina o script após o redirecionamento
        
            $this->error = "Nome e setor não podem ser vazios";
        
    }
}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerRamaisEx($_POST);
    $ramaisEx = new RamaisEx();
    $ramaisExDao = new RamaisExDao();
    $controller->create($ramaisEx, $ramaisExDao);
}

