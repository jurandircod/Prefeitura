<?php

namespace App\Model;



class RamaisExDao
{
    private $sql;
    private $status;

    public function getStatus()
    {
        return $this->status;
    }

    public function create(RamaisEx $ramaisEx)
    {
        $this->sql = "INSERT INTO tbramais_ex(nome, numero, setor) VALUES (?,?,?)";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $ramaisEx->getNome());
        $stmt->bindValue(2, $ramaisEx->getNumero());
        $stmt->bindValue(3, $ramaisEx->getSetor());
        $this->query($stmt->execute());
    }

    public function read()
    {
        $this->sql = "SELECT * FROM tbramais_ex";
        $stmt =  Conexao::getConn()->prepare($this->sql);
        $this->query($stmt->execute());
    }


    public function update(RamaisEx $ramaisEx)
    {
        $this->sql = "UPDATE tbramais_ex SET nome = ?, numero = ?, setor = ? WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $ramaisEx->getNome());
        $stmt->bindValue(2, $ramaisEx->getNumero());
        $stmt->bindValue(3, $ramaisEx->getSetor());
        $stmt->bindValue(4, $ramaisEx->getId());
        $this->query($stmt->execute());
    }

    public function delete(RamaisEx $ramaisEx)
    {
        $this->sql = "DELETE FROM tbramais_ex WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $ramaisEx->getId());
        $this->query($stmt->execute());
    }


    private function query($query)
    {
        if ($query) {
            //Sucesso na consulta
            $this->status = 1;
        } else {
            //Erro na consulta
            $this->status = 0;
        }
    }
}
