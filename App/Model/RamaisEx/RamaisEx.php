<?php

namespace App\Model\RamaisEx;

class RamaisEx{
    
    protected $id;
    protected $nome;
    protected $numero;
    protected $setor;

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getSetor(){
        return $this->setor;
    }

    public function setSetor($setor){
        $this->setor = $setor;
    }
}


?>