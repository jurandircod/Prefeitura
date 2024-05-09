<?php

namespace App\Model;
use App\Model\Conexao;

class UsuarioDao extends Read{
    private $sql;
    public function create(){
        $this->sql = "INSERT INTO tbusuarios(nome,) VALUES ()";
    }

    
    public function update(){

    }

    public function delete(){

    }
}



?>