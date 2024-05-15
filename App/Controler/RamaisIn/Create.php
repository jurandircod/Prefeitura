<?php

require_once '../../../vendor/autoload.php';

use App\Model\RamaisIn\RamaisInDao;
use App\Model\RamaisIn\RamaisIn;

class ControlerRamaisIn
{
    private $id;
    private $numero;
    private $responsavel;
    private $setor;
    private $idLocais;
    private $error;

    public function __construct($arrayPost)
    {
        // Usando $arrayPost passado para o construtor
        $this->id = $arrayPost['ramaisInId'];
        $this->numero = $arrayPost['ramaisInNumero'];
        $this->responsavel = $arrayPost['ramaisInResponsavel'];
        $this->setor = $arrayPost['ramaisInSetor'];
        $this->idLocais = $arrayPost['ramaisInIdLocais'];
    }

    public function create(RamaisIn $ramaisIn, RamaisInDao $ramaisInDao)
    {

        
            $ramaisIn->setNumero($this->numero);
            $ramaisIn->setResponsavel($this->responsavel);
            $ramaisIn->setfkLocais($this->idLocais);
            $ramaisIn->setSetor($this->setor);
            $ramaisInDao->create($ramaisIn);
            // Redirecionamento para uma rota dentro do servidor
            header("Location: /prefeitura/index.php?p=ramaisIn");
            exit; // Termina o script após o redirecionamento
        
            $this->error = "Nome e setor não podem ser vazios";
        
    }
}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerRamaisIn($_POST);
    $ramaisIn = new RamaisIn();
    $ramaisInDao = new RamaisInDao();
    $controller->create($ramaisIn, $ramaisInDao);
}

