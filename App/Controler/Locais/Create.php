<?php

require_once '../../../vendor/autoload.php';

use App\Model\Locais\Locais;
use App\Model\Locais\LocaisDao;

class LocaisControler
{
    private $id;
    private $nome;
    private $descricao;
    private $rua;
    private $bairro;
    private $numero;
    private $idSecretaria;
    private $error;

    public function __construct($arrayPost)
    {
        // Usando $arrayPost passado para o construtor
        $this->id = $arrayPost['locaisId'];
        $this->nome = $arrayPost['locaisNome'];
        $this->descricao = $arrayPost['locaisDescricao'];
        $this->rua = $arrayPost['locaisRua'];
        $this->bairro = $arrayPost['locaisBairro'];
        $this->numero = $arrayPost['locaisNumero'];
        $this->idSecretaria = $arrayPost['locaisIdSecretaria'];
    }

    public function create(Locais $locais, LocaisDao $locaisDao)
    {
        $locais->setNome($this->nome);
        $locais->setDescricao($this->descricao);
        $locais->setRua($this->rua);
        $locais->setBairro($this->bairro);
        $locais->setNumero($this->numero);
        $locais->setFkSecretaria($this->idSecretaria);
        $locaisDao->create($locais);
        // Redirecionamento para uma rota dentro do servidor
        header("Location: /prefeitura/index.php?p=locais&status=1");
        exit; // Termina o script após o redirecionamento

        $this->error = "Nome e setor não podem ser vazios";
    }

    public function delete(Locais $locais, LocaisDao $locaisDao, $id)
    {
        $locais->setId($id);
        $locaisDao->delete($locais);
        header("Location: /prefeitura/index.php?p=locais&status=4");
        exit;
    }

    public function update(Locais $locais, LocaisDao $locaisDao, $id)
    {
        $locais->setId($id);
        $locais->setNome($this->nome);
        $locais->setDescricao($this->descricao);
        $locais->setRua($this->rua);
        $locais->setBairro($this->bairro);
        $locais->setNumero($this->numero);
        $locais->setFkSecretaria($this->idSecretaria);
        $locaisDao->update($locais);
        header("Location: /prefeitura/index.php?p=locais&status=2");
        exit;
    }
}


// Verifica se é uma requisição POST antes de instanciar e chamar o método create()
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new LocaisControler($_POST);
    $locais = new Locais();
    $locaisDao = new LocaisDao();
    $controller->create($locais, $locaisDao);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['idDelete'])) {
        $controller = new LocaisControler($_GET);
        $locais = new Locais();
        $locaisDao = new LocaisDao();
        $idDelete = $_GET['idDelete'];
        $controller->delete($locais, $locaisDao, $idDelete);
    } elseif (isset($_GET['idUpdate'])) {
        $controller = new LocaisControler($_GET);
        $locais = new Locais();
        $locaisDao = new LocaisDao();
        $idUpdate = $_GET['idUpdate'];
        $controller->update($locais, $locaisDao, $idUpdate);
    }
}
