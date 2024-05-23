<?php
namespace App\Controler;


class SessionControl{
    
public function session(){
    if(!isset($_SESSION)){
        die("logue com seu Usuario para acessar essa funcionalidade");
    }
}
}

?>