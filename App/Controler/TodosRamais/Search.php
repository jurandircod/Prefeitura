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
        
        $sql = "SELECT * FROM tbramais_ex WHERE nome LIKE ? OR numero LIKE ? OR setor LIKE ?"; //consulta SQL
    try {
        $stmt = Conexao::getConn()->prepare($sql);
        // Bind the search term to all three placeholders
        $param = $this->search;
        $searchParam = "%$param%"; // Wildcard search term
        $stmt->bindValue(1, $searchParam);
        $stmt->bindValue(2, $searchParam);
        $stmt->bindValue(3, $searchParam);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $array = array();

        foreach ($result as $row) {
            $array[] = array(
                'setor' => $row['setor'],
                'numero' => $row['numero'],
                'nome' => $row['nome']
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
