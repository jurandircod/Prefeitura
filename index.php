<?php
require_once 'vendor/autoload.php';


$ramaisExDao = new App\Model\RamaisEx\RamaisExDao();
$ramaisEx = new \App\Model\RamaisEx\RamaisEx();

$ramaisIn = new \App\Model\RamaisIn\RamaisIn();
$ramaisInDao = new \App\Model\RamaisIn\RamaisInDao();


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

    <form action="App/Controler//Usuario//Create.php" method="post">
        <div>
            <label for="">Nome</label>
            <input type="text" name="usuarioNome">
        </div>
        <div>
            <label for="">Setor</label>
            <input type="text" name="usuarioSenha">
        </div>
        <!--<div>
            <label for="">Numero</label>
            <input type="text" name="locaisRua">
        </div>
        <div>
            <label for="">Locais</label>
            <input type="text" name="locaisIdSecretaria">
        </div>
        <div>
            <label for="">Locais</label>
            <input type="text" name="locaisBairro">
        </div>
        <div>
            <label for="">Locais</label>
            <input type="text" name="locaisNumero">
        </div>-->
        <button type="submit">Enviar</button>
    </form>

</body>

</html>