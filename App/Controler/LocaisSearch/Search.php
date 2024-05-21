<?php
include_once("../../../vendor/autoload.php");
use App\Model\Conexao;

class Consultasearch{
    private $search;
    
    public function __construct($search)
    {
        $this->search = $search;
    }

    public function ramaisEx(){
        
        $sql = "SELECT 
        tbramais_in.numero AS ramaisNumero, 
        tblocais.nome AS locaisNome, 
        tbsecretarias.nome AS secretariaNome, 
        tblocais.rua, 
        tblocais.descricao, 
        tblocais.bairro, 
        tblocais.numero AS locaisNumero
    FROM 
        tblocais
    JOIN 
        tbsecretarias ON tbsecretarias.id = tblocais.fksecretarias
    JOIN 
        tbramais_in ON tblocais.id = tbramais_in.fklocais
    WHERE 
        tblocais.nome LIKE ? OR tbsecretarias.nome LIKE ?"; //consulta SQL
    try {
        $stmt = Conexao::getConn()->prepare($sql);
        // Bind the search term to all three placeholders
        $param = $this->search;
        $searchParam = "%$param%"; // Wildcard search term
        $stmt->bindValue(1, $searchParam);
        $stmt->bindValue(2, $searchParam);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $array = array();

        foreach ($result as $row) {
            $array[] = array(
                'locaisNome' => $row['locaisNome'],
                'secretariaNome' => $row['secretariaNome'],
                'rua' => $row['rua'],
                'descricao' => $row['descricao'],
                'bairro' => $row['bairro'],
                'locaisNumero' => $row['locaisNumero'],
                'ramaisNumero' => $row['ramaisNumero']
            );
        }

        echo json_encode($array);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Trate erros de banco de dados
    }
    }
}

$search = filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_STRING); 
$result = new Consultasearch($search);
$result->ramaisEx();
?>
