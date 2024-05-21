<?php


namespace App\Model\RamaisIn;
use App\Model\Conexao;
use App\Model\Read;

class RamaisInDao extends Read
{

    private $sql;
    
    public function create(RamaisIn $ramaisIn)
    {
        $sql = "INSERT INTO tbramais_in (numero, responsavel, setor, fklocais) VALUES (?,?,?,?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ramaisIn->getNumero());
        $stmt->bindValue(2, $ramaisIn->getResponsavel());
        $stmt->bindValue(3, $ramaisIn->getSetor());
        $stmt->bindValue(4, $ramaisIn->getFkLocais());
        $stmt->execute();
    }
    public function update(RamaisIn $ramaisIn)
    {
        $sql = 'UPDATE tbramais_in SET numero = ?, responsavel = ?, setor = ?, fklocais = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ramaisIn->getNumero());
        $stmt->bindValue(2, $ramaisIn->getResponsavel());
        $stmt->bindValue(3, $ramaisIn->getSetor());
        $stmt->bindValue(4, $ramaisIn->getFkLocais());
        $stmt->bindValue(5, $ramaisIn->getId());
        $stmt->execute();
    }


    public function delete(RamaisIn $ramaisIn)
    {
        $this->sql = "DELETE FROM tbramais_in WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $ramaisIn->getId());
        $this->executeStatement($stmt);
    }
}
