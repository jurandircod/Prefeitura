<?php
namespace App\Model;

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
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        endif;
            return [];
        
    }

    /*
    *Função que trata os erros que ocorrem nas alterações feitas no banco pelas classes 
    *retornando o tipo de erro pro atributo status
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
