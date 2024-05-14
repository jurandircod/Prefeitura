<?php



namespace App\Model\RamaisEx;


use App\Model\Conexao;
use App\Model\Read;

class RamaisExDao extends Read
{

    private $sql;
    /**
     * Cria um novo registro de ramal.
     *
     * @param RamaisEx $ramaisEx O objeto RamaisEx contendo os dados do ramal a ser criado.
     * @return void
     */

    public function create(RamaisEx $ramaisEx)
    {
        $sql = "INSERT INTO tbramais_ex(nome, numero, setor) VALUES (?,?,?)";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ramaisEx->getNome());
        $stmt->bindValue(2, $ramaisEx->getNumero());
        $stmt->bindValue(3, $ramaisEx->getSetor());
        $this->executeStatement($stmt);
    }

    /**
     * Atualiza um registro de ramal existente.
     *
     * @param RamaisEx $ramaisEx O objeto RamaisEx contendo os dados atualizados do ramal.
     * @return void
     */
    public function update(RamaisEx $ramaisEx)
    {
        $sql = "UPDATE tbramais_ex SET nome = IFNULL(?, nome), numero = IFNULL(?, numero), setor = IFNULL(?, setor) WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ramaisEx->getNome());
        $stmt->bindValue(2, $ramaisEx->getNumero());
        $stmt->bindValue(3, $ramaisEx->getSetor());
        $stmt->bindValue(4, $ramaisEx->getId());
        $this->executeStatement($stmt);
    }

    /**
     * Deleta um registro de ramal existente.
     *
     * @param RamaisEx $ramaisEx O objeto RamaisEx contendo o id do ramal a ser deletado.
     * @return void
     */
    public function delete(RamaisEx $ramaisEx)
    {
        $sql = "DELETE FROM tbramais_ex WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $ramaisEx->getId());
        $this->executeStatement($stmt);
    }
    
}
