<?php
require_once 'vendor/autoload.php';


$ramaisExDao = new App\Model\RamaisEx\RamaisExDao();
$ramaisEx = new \App\Model\RamaisEx\RamaisEx();

$ramaisEx->setNome('a');
$ramaisEx->setNumero('22');
$ramaisEx->setSetor('af');

$sql = "SELECT * FROM tbramais_ex";
$ramaisExDao->setSqlRead($sql);
$ramaisExDao->create($ramaisEx);
foreach ($ramaisExDao->read() as $nome) {
    echo $nome['numero'];
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="App/Controler//RamaisEx//Create.php" method="post">
        <div>
            <label for="">Nome</label>
            <input type="text" name="ramaisExNome">
        </div>
        <div>
            <label for="">Setor</label>
            <input type="text" name="ramaisExSetor">
        </div>
        <div>
            <label for="">Numero</label>
            <input type="text" name="ramaisExNumero">
        </div>
        <button type="submit">Enviar</button>
    </form>

</body>

</html>