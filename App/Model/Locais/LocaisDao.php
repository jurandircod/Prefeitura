<?php
namespace App\Model\Locais;
use App\Model\Conexao;
use App\Model\Read;

class LocaisDao extends Read {
    
    private $sql;

    public function create(Locais $locais)
    {
        $this->sql = "INSERT INTO tblocais(nome, descricao, rua, bairro, numero) VALUES (?,?,?,?,?)";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getNome());
        $stmt->bindValue(2, $locais->getNumero());
        $stmt->bindValue(3, $locais->getRua());
        $stmt->bindValue(4, $locais->getBairro());
        $stmt->bindValue(5, $locais->getNumero());
        $this->executeStatement($stmt);
    }

    public function read()
    {
        $this->sqlRead;
        $stmt =  Conexao::getConn()->prepare($this->sql);
        $this->executeStatement($stmt);
    }


    public function update(Locais $locais)
    {
        $this->sql = "UPDATE tblocais SET nome = IFNULL(?, nome), descricao = IFNULL(?, descricao), rua =IFNULL(?, rua), bairro = IFNULL(?, numero) WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getNome());
        $stmt->bindValue(2, $locais->getNumero());
        $stmt->bindValue(3, $locais->getRua());
        $stmt->bindValue(4, $locais->getBairro());
        $stmt->bindValue(5, $locais->getNumero());
        $this->executeStatement($stmt);
    }

    public function delete(Locais $locais)
    {
        $this->sql = "DELETE FROM tblocais WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $locais->getId());
        $this->executeStatement($stmt);
    }


   
}