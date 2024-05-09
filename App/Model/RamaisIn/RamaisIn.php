<?php

namespace App\Model\RamaisIn;

class RamaisIn {
    
    private $id;
    private $numero;
    private $responsavel;
    private $setor;
    private $fkSecretaria;

    public function getNumero() : String{
        return $this->numero;
    }
    
    public function setNumero(String $numero){
        $this->numero = $numero;
    }

    public function getfkSecretaria() : String{
        return $this->fkSecretaria;
    }
    
    public function setfkSecretaria(String $fkSecretaria){
        $this->fkSecretaria = $fkSecretaria;
    }


    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getResponsavel(): String{
        return $this->responsavel;
    }
    
    public function setResponsavel(string $responsavel){
        $this->responsavel = $responsavel;
    }

    public function getSetor(): string{
        return $this->setor;
    }

    public function setSetor(string $setor){
        $this->setor = $setor;
    }
}

?>