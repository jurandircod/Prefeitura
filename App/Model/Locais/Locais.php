<?php
namespace App\Model\Locais;


class Locais {
    
    private $id;
    private $nome;
    private $numero;
    private $descricao;
    private $rua;
    private $bairro;

    public function getId(){
        return $this->id; 
     }
 
     public function setId($id){
         $this->id = $id;
     }

    public function getNome(){
       return $this->nome; 
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNumero(){
        return $this->numero; 
     }
 
     public function setNumero($numero){
         $this->numero = $numero;
     }

     public function getDescricao(){
        return $this->descricao; 
     }
 
     public function setDescricao($descricao){
         $this->descricao = $descricao;
     }

     public function getRua(){
        return $this->rua; 
     }
 
     public function setRua($rua){
         $this->rua = $rua;
     }

     public function getBairro(){
        return $this->bairro; 
     }
 
     public function setBairro($bairro){
         $this->bairro = $bairro;
     }

}