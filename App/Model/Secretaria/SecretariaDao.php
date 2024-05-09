<?php
namespace App\Model\Secretaria;
use App\Model\Conexao;
class SecretariaDao
{
    
    /**
     * Cria um novo registro de Secretaria.
     *
     * @param Secretaria $nome O objeto RamaisEx contendo os dados do ramal a ser criado.
     * @return void
     */

    public function create(Secretaria $secretaria){
        $sql = 'INSERT INTO tbsecretarias(nome) VALUES (?)';
        $stmt =  Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $secretaria->getNome());
        $stmt->execute();
    }

    public function update(Secretaria $secretaria){
        $sql = "UPDATE tbsecretarias SET nome = IFNULL(?, nome) 
        WHERE id =?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $secretaria->getNome());
        $stmt->bindValue(2, $secretaria->getId());
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
