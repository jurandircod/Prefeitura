<?php
namespace App\Model\Secretaria;
use App\Model\Conexao;
class SecretariaDao
{
    
    public function create(Secretaria $nome){
        $sql = 'INSERT INTO tbsecretarias(nome) VALUES (?)';
        $stmt =  Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $nome->getNome());
        $stmt->execute();
    }

    public function update(Secretaria $nome){
        $sql = "UPDATE `tbsecretarias` SET `nome`='?' 
        WHERE id =?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $nome->getNome());
        $stmt->bindValue(2, $nome->getId());
    }

    public function delete(Secretaria $id){
        $sql = "DELETE FROM tbsecretarias WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id->getId());

    }

    public function read(){
        $sql = "SELECT * FROM tbsecretarias";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        endif;
            return [];
        
    }
}
