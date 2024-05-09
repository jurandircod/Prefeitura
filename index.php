<?php
require_once 'vendor/autoload.php';

$ramaisExDao = new \App\Model\RamaisEx\RamaisExDao();
$ramaisEx = new \App\Model\RamaisEx\RamaisEx();

$ramaisEx->setNome("teste1");

$ramaisEx->setSetor("teste2");
$ramaisEx->setId(11);

$ramaisExDao->update($ramaisEx);



?>