<?php

namespace App\Model\RamaisIn;

class RamaisIn {
    
    private $id;
    private $numero;
    private $responsavel;
    private $setor;
    private $FkSecretaria;

    public function getNumero() : String{
        return $this->numero;
    }
    
    public function setNumero(String $numero){
        $this->numero = $numero;
    }

    public function getFkSecretaria() : String{
        return $this->FkSecretaria;
    }
    
    public function setFkSecretaria(String $fkSecretaria){
        $this->FkSecretaria = $fkSecretaria;
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