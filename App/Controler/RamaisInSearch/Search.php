<?php
include_once("../../../vendor/autoload.php");
use App\Model\Conexao;

class Consultasearch{
    private $search;
    
    public function __construct($search)
    {
        $this->search = $search;
    }

    public function ramaisIn(){
        
        $sql = "SELECT tblocais.nome, tbramais_in.responsavel, tbramais_in.numero, tbramais_in.setor 
        FROM tbramais_in JOIN tblocais ON tbramais_in.fklocais = tblocais.id 
        WHERE tbramais_in.responsavel LIKE ? OR tbramais_in.numero LIKE ? OR tbramais_in.setor LIKE ? OR tblocais.nome LIKE ? ORDER BY tblocais.nome ASC"; //consulta SQL
    try {
        $stmt = Conexao::getConn()->prepare($sql);
        // Bind the search term to all three placeholders
        $param = $this->search;
        $searchParam = "%$param%"; // Wildcard search term
        $stmt->bindValue(1, $searchParam);
        $stmt->bindValue(2, $searchParam);
        $stmt->bindValue(3, $searchParam);
        $stmt->bindValue(4, $searchParam);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $array = array();

        foreach ($result as $row) {
            $array[] = array(
                'nome' => $row['nome'],
                'setor' => $row['setor'],
                'numero' => $row['numero'],
                'responsavel' => $row['responsavel']
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
$result->ramaisIn();
?>
