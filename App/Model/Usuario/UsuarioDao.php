<?php

namespace App\Model\Usuario;
use App\Model\Conexao;
use App\Model\Read;


class UsuarioDao extends Read{
    private $sql;
    
    public function create(Usuario $usuario){
        $this->sql = "INSERT INTO tbusuarios(nome, senha) VALUES (?, ?)";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $usuario->getNome());
        $stmt->bindValue(2, $usuario->getSenha());
        $this->executeStatement($stmt);
    }

    
    public function update(Usuario $usuario){
        $this->sql = "UPDATE tbusuarios SET nome = IFNULL(?, nome), senha = IFNULL(?, senha) WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $usuario->getNome());
        $stmt->bindValue(2, $usuario->getSenha());
        $this->executeStatement($stmt);
    }

    public function delete(Usuario $usuario){
        $this->sql = "DELETE tbusuarios WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $usuario->getId());
        $this->executeStatement($stmt);
    }
}



?>