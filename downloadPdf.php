<?php
// Caminho do arquivo que você deseja oferecer para download
$filePath = 'PDFpref.pdf'; // Altere para o caminho do seu arquivo

// Verifique se o arquivo existe
if (file_exists($filePath)) {
    // Defina os cabeçalhos necessários para o download do arquivo
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);

    // Redireciona de volta para a página inicial após o download
    // Você pode usar header() para redirecionamento ou JavaScript
    echo '<script type="text/javascript">
        setTimeout(function() {
            window.location.href = "index.php";
        }, 1000);
    </script>';
    exit;
} else {
    echo 'O arquivo não foi encontrado.';
}