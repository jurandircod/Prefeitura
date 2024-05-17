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
        
    }

    public function update(RamaisIn $ramaisIn, RamaisInDao $ramaisInDao, $id)
    {
        $ramaisIn->setId($id);
        $ramaisIn->setResponsavel($this->responsavel);
        $ramaisIn->setNumero($this->numero);
        $ramaisIn->setSetor($this->setor);
        $ramaisIn->setfkLocais($this->idLocais);
        $ramaisInDao->update($ramaisIn);
        header("Location: /prefeitura/index.php?p=ramaisIn");
        exit;
    }

    public function delete(RamaisIn $ramaisIn, RamaisInDao $ramaisInDao, $id)
    {
        $ramaisIn->setId($id);
        $ramaisInDao->delete($ramaisIn);
        
        header("Location: /prefeitura/index.php?p=ramaisIn");
        exit;
    }

}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerRamaisIn($_POST);
    $ramaisIn = new RamaisIn();
    $ramaisInDao = new RamaisInDao();
    $controller->create($ramaisIn, $ramaisInDao);
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['idDelete'])) {
        $controller = new ControlerRamaisIn($_GET);
        $ramaisIn = new ramaisIn();
        $ramaisInDao = new ramaisInDao();
        $idDelete = $_GET['idDelete'];
        $controller->delete($ramaisIn, $ramaisInDao, $idDelete);
    } elseif (isset($_GET['idUpdate'])) {
        $controller = new ControlerRamaisIn($_GET);
        $ramaisIn = new ramaisIn();
        $ramaisInDao = new ramaisInDao();
        $idUpdate = $_GET['idUpdate'];
        $controller->update($ramaisIn, $ramaisInDao, $idUpdate);
    }
}
