<?php
require('fpdf/fpdf.php');
require_once 'vendor/autoload.php';
use App\Model\Conexao;

class PDF extends FPDF {
    // Cabeçalho do documento
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Titulo do Relatorio', 0, 1, 'C');
        $this->Ln(10);
    }

    // Rodapé do documento
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

// Conectar ao banco de dados
try {
    $pdo = new \PDO('mysql:host=localhost;dbname=prefeitura', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Consulta SQL
$sql = "SELECT nome, numero, setor FROM tbramais_ex";
$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cria o PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

foreach ($usuarios as $usuario) {
    $pdf->Cell(0, 10, 'Nome: ' . $usuario['nome'], 0, 1);
    $pdf->Cell(0, 10, 'numero: ' . $usuario['numero'], 0, 1);
    $pdf->Cell(0, 10, 'setor: ' . $usuario['setor'], 0, 1);
    $pdf->Ln(5);
}

$pdf->Output('D', 'relatorio.pdf');
?>
