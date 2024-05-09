<?php
require_once 'vendor/autoload.php';

$ramaisExDao = new \App\Model\RamaisExDao();
$ramaisEx = new \App\Model\RamaisEx();

$ramaisEx->setNome("agricultura");
$ramaisEx->setNumero("9988");
$ramaisEx->setSetor("agricultura");

$ramaisExDao->create($ramaisEx);

if($ramaisExDao->getStatus() == 1 ){
    echo "sucesso na criação";
}else{
    echo "erro na criação";
}

?>