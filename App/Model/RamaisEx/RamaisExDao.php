<?php

namespace App\Model\RamaisEx;

use App\Model\Conexao;

class RamaisExDao
{
    private $status;

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
     * Retorna todos os registros de ramais.
     *
     * @return array|false Retorna um array contendo os registros de ramais, ou false em caso de falha.
     */
    public function read()
    {
        $sql = "SELECT * FROM tbramais_ex";
        $stmt =  Conexao::getConn()->prepare($sql);
        return $this->executeStatement($stmt);
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

    /**
     * Executa uma declaração preparada SQL.
     *
     * @param PDOStatement $stmt A declaração preparada a ser executada.
     * @return array|false Retorna um array contendo os resultados da consulta, ou false em caso de falha.
     */

    private function executeStatement($stmt)
    {
        try {
            $stmt->execute();
            $this->status = 1;
            return $stmt->fetchAll(\PDO::FETCH_ASSOC); // Retorna resultados da consulta
        } catch (\PDOException $e) {
            // Tratar o erro
            $this->status = 0;
            echo "Erro na consulta: " . $e->getMessage();
            return false;
        }
    }
}
