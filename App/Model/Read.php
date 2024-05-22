<?php
namespace App\Model;

use PDOException;

class Read
{

    protected $sqlRead;
    protected $status;

    /*
    *getSetters
    *
    */
    public function getSqlRead()
    {
        return $this->sqlRead;
    }

    public function setSqlRead($sqlRead)
    {
        $this->sqlRead = $sqlRead;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /*
    função reader ela recebe um comando sql contido do atributo sqlRead e executa retornando os resultados da consulta
    que serão tratados no controler
    */
    public function read(){
        
        $stmt = Conexao::getConn()->prepare($this->sqlRead);
        
        try{
        
            $stmt->execute();
            
        }catch(PDOException $e){
            
            die("Erro na consulta: $e");
        
        }
        
        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        endif;
            return [];
    }

    /**
     * Executa uma declaração preparada SQL.
     *
     * @param PDOStatement $stmt A declaração preparada a ser executada.
     * @return array|false Retorna um array contendo os resultados da consulta, ou false em caso de falha.
     */

    protected function executeStatement($stmt)
    {
        try {
            $stmt->execute();
            $this->status = true;
            // Retorna resultados da consulta
        } catch (\PDOException $e) {
            // Tratar o erro
            $this->status = "Erro na consulta: " . $e->getMessage();
        }
    }
}
