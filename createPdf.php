<?php
require('fpdf/fpdf.php');
require_once 'vendor/autoload.php';
use App\Model\Conexao;

class PDF extends FPDF {
    // Cabeçalho do documento
    function Header() {
        $this->SetFont('Arial', 'B', 14);
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

// Função para desenhar uma célula formatada
function drawCell($pdf, $x, $y, $w, $h, $txt, $border = 1, $align = 'L') {
    $pdf->SetXY($x, $y);
    $pdf->Cell($w, $h, $txt, $border, 0, $align);
}

$x = 10;
$y = $pdf->GetY();
$w = 90; // Largura de cada coluna
$h = 10; // Altura de cada célula
$colCount = 0;
filter_input(INPUT_GET, 'ajax', FILTER_SANITIZE_STRING); 
foreach ($usuarios as $index => $usuario) {
    
    $usuarioNome = filter_input(INPUT_GET, $usuario['nome'], FILTER_SANITIZE_STRING);
    // Coluna esquerda
    drawCell($pdf, $x, $y, $w, $h, 'Nome: ' . $usuarioNome);
    drawCell($pdf, $x, $y + $h, $w, $h, 'Numero: ' . $usuario['numero']);
    drawCell($pdf, $x, $y + 2 * $h, $w, $h, 'Setor: ' . $usuario['setor']);

    if ($colCount == 0) {
        // Próxima coluna
        $x += $w;
        $colCount++;
    } else {
        // Nova linha
        $x = 10;
        $y += 3 * $h + 5;
        $colCount = 0;
    }

    // Se estamos na última linha da página, adiciona uma nova página
    if ($y + 3 * $h > $pdf->GetPageHeight() - 20) {
        $pdf->AddPage();
        $x = 10;
        $y = $pdf->GetY();
        $colCount = 0;
    }
}

$pdf->Output('D', 'relatorio.pdf');
?>
