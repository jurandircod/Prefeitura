<?php
namespace App\Model\Secretaria;
use App\Model\Conexao;
use App\Model\Read;

class SecretariaDao extends Read
{
    private $sql;
    
    /**
     * Cria um novo registro de Secretaria.
     *
     * @param Secretaria $nome O objeto RamaisEx contendo os dados do ramal a ser criado.
     * @return void
     */

    public function create(Secretaria $secretaria){
        $this->sql = 'INSERT INTO tbsecretarias(nome) VALUES (?)';
        $stmt =  Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $secretaria->getNome());
        $stmt->execute();
    }

    public function update(Secretaria $secretaria){
        $this->sql = "UPDATE tbsecretarias SET nome = IFNULL(?, nome) 
        WHERE id =?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $secretaria->getNome());
        $stmt->bindValue(2, $secretaria->getId());
    }

    public function delete(Secretaria $id){
        $this->sql = "DELETE FROM tbsecretarias WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $id->getId());

    }

}
