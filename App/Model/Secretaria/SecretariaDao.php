<?php

namespace App\Model\Secretaria;

use App\Model\Conexao;
use App\Model\Locais\Locais;
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

    public function create(Secretaria $secretaria)
    {
        $this->sql = 'INSERT INTO tbsecretarias(nome) VALUES (?)';
        $stmt =  Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $secretaria->getNome());
        $stmt->execute();
    }

    public function update(Secretaria $secretaria)
    {
        $this->sql = "UPDATE tbsecretarias SET nome = IFNULL(?, nome) 
        WHERE id =?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $secretaria->getNome());
        $stmt->bindValue(2, $secretaria->getId());
        $stmt->execute();
    }

    public function delete($id)
    {

        $stmt = Conexao::getConn()->beginTransaction();
        $sql = "DELETE FROM tbramais_in WHERE fklocais IN (SELECT id FROM tblocais WHERE fksecretarias = :id_secretaria)";

        // Passo 1: Excluir os ramais associados aos locais que pertencem à secretaria
       
        $stmt = Conexao::getConn()->prepare($sql);
        
        $stmt->execute(['id_secretaria' => $id]);

        // Passo 2: Excluir os locais associados à secretaria
        $sql = "DELETE FROM tblocais WHERE fksecretarias = :id_secretaria";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['id_secretaria' => $id]);

        // Passo 3: Excluir a secretaria
        $sql = "DELETE FROM tbsecretarias WHERE id = :id_secretaria";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute(['id_secretaria' => $id]);
        // Confirmar a transação
        $stmt = Conexao::getConn()->commit();

    }
}
