<?php
namespace App\Model\Locais;
use App\Model\Conexao;
use App\Model\Read;

class LocaisDao extends Read {
    
    private $sql;

    public function create(Locais $locais)
    {
        $this->sql = "INSERT INTO tblocais(nome, descricao, rua, bairro, numero, fksecretarias) VALUES (?,?,?,?,?,?)";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getNome());
        $stmt->bindValue(2, $locais->getDescricao());
        $stmt->bindValue(3, $locais->getRua());
        $stmt->bindValue(4, $locais->getBairro());
        $stmt->bindValue(5, $locais->getNumero());
        $stmt->bindValue(6, $locais->getFkSecretaria());
        $this->executeStatement($stmt);
        
    }

    public function update(Locais $locais)
    {
        $this->sql = "UPDATE tblocais SET nome = IFNULL(?, nome), descricao = IFNULL(?, descricao), rua = IFNULL(?, rua), bairro = IFNULL(?, bairro), fksecretarias =IFNULL(?, fksecretarias) WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getNome());
        $stmt->bindValue(2, $locais->getNumero());
        $stmt->bindValue(3, $locais->getRua());
        $stmt->bindValue(4, $locais->getBairro());
        $stmt->bindValue(5, $locais->getFkSecretaria());
        $stmt->bindValue(6, $locais->getId());
        $this->executeStatement($stmt);
        
    }

    public function delete(Locais $locais)
    {
        $this->sql = "DELETE FROM tbramais_in WHERE fklocais = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getId());
        $this->executeStatement($stmt);
        
        $this->sql = "DELETE FROM tblocais WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getId());
        $this->executeStatement($stmt);   
    }


   
}