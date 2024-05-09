<?php

namespace App\Model;

class Read
{

    protected $sqlRead;
    protected $status;

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

    public function read(){
        
        $stmt = Conexao::getConn()->prepare($this->sqlRead);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        endif;
            return [];
        
    }

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
