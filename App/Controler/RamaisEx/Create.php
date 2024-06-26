<?php

require_once '../../../vendor/autoload.php';

use App\Model\RamaisEx\RamaisExDao;
use App\Model\RamaisEx\RamaisEx;

class ControlerRamaisEx
{
    private $nome;
    private $numero;
    private $setor;

    public function __construct($arrayPost,)
    {
        // Usando $arrayPost passado para o construtor
        $this->nome = $arrayPost['ramaisExNome'];
        $this->numero = $arrayPost['ramaisExNumero'];
        $this->setor = $arrayPost['ramaisExSetor'];
    }

    public function create(RamaisEx $ramaisEx, RamaisExDao $ramaisExDao)
    {
        if ($this->nome != NULL) {
            $ramaisEx->setNome($this->nome);
            $ramaisEx->setNumero($this->numero);
            $ramaisEx->setSetor($this->setor);
            $ramaisExDao->create($ramaisEx);
            // Redirecionamento para uma rota dentro do servidor
            header("Location: /prefeitura/index.php?p=ramaisEx&status=1");
            exit; // Termina o script após o redirecionamento
        } else {
            $ramaisEx->setNome("A definir");
            $ramaisEx->setNumero($this->numero);
            $ramaisEx->setSetor($this->setor);
            $ramaisExDao->create($ramaisEx);
            // Redirecionamento para uma rota dentro do servidor
            header("Location: /prefeitura/index.php?p=ramaisEx&status=1");
            exit;
        }
    }

    public function delete(RamaisEx $ramaisEx, RamaisExDao $ramaisExDao, $id)
    {
        $ramaisEx->setId($id);
        $ramaisExDao->delete($ramaisEx);
        header("Location: /prefeitura/index.php?p=ramaisEx&status=4");
        exit;
    }

    public function update(RamaisEx $ramaisEx, RamaisExDao $ramaisExDao, $id)
    {
        if ($this->nome != NULL) {
            $ramaisEx->setId($id);
            $ramaisEx->setNome($this->nome);
            $ramaisEx->setNumero($this->numero);
            $ramaisEx->setSetor($this->setor);
            $ramaisExDao->update($ramaisEx);
            header("Location: /prefeitura/index.php?p=ramaisEx&status=2");
            exit;
        } else {
            $ramaisEx->setId($id);
            $ramaisEx->setNome("A definir");
            $ramaisEx->setNumero($this->numero);
            $ramaisEx->setSetor($this->setor);
            $ramaisExDao->update($ramaisEx);
            header("Location: /prefeitura/index.php?p=ramaisEx&status=2");
            exit;
        }
    }
}

// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ControlerRamaisEx($_POST);
    $ramaisEx = new RamaisEx();
    $ramaisExDao = new RamaisExDao();
    $controller->create($ramaisEx, $ramaisExDao);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['idDelete'])) {
        $controller = new ControlerRamaisEx($_POST);
        $ramaisEx = new RamaisEx();
        $ramaisExDao = new RamaisExDao();
        $idDelete = $_GET['idDelete'];
        $controller->delete($ramaisEx, $ramaisExDao, $idDelete);
    } elseif (isset($_GET['idUpdate'])) {
        $controller = new ControlerRamaisEx($_GET);
        $ramaisEx = new RamaisEx();
        $ramaisExDao = new RamaisExDao();
        $idUpdate = $_GET['idUpdate'];
        $controller->update($ramaisEx, $ramaisExDao, $idUpdate);
    }
}
