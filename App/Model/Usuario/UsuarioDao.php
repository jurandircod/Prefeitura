<?php

namespace App\Model\Usuario;

use App\Model\Conexao;
use App\Model\Read;


class UsuarioDao extends Read
{
    private $sql;

    public function create(Usuario $usuario)
    {

        $this->sql = "INSERT INTO tbusuarios(nome, senha) VALUES (?, ?)";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $hash = password_hash($usuario->getSenha(), PASSWORD_BCRYPT);
        $stmt->bindValue(1, $usuario->getNome());
        $stmt->bindValue(2, $hash);
        $this->executeStatement($stmt);
    }


    public function update(Usuario $usuario)
    {
        $this->sql = "UPDATE tbusuarios SET nome = IFNULL(?, nome), senha = IFNULL(?, senha) WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $usuario->getNome());
        $stmt->bindValue(2, $usuario->getSenha());
        $this->executeStatement($stmt);
    }

    public function delete(Usuario $usuario)
    {
        $this->sql = "DELETE tbusuarios WHERE id = ?";
        $stmt = Conexao::getConn()->prepare($this->sql);
        $stmt->bindValue(1, $usuario->getId());
        $this->executeStatement($stmt);
    }

    public function logar(Usuario $usuario) {
        // Inicia a sessão se ainda não estiver iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Consulta para recuperar o hash da senha do usuário
        $sql = "SELECT nome, senha FROM tbusuarios WHERE nome = ?";
        $autentic = Conexao::getConn()->prepare($sql);
        $autentic->bindValue(1, $usuario->getNome());
        $autentic->execute();
    
        // Verifica se o usuário existe no banco de dados
        if ($autentic->rowCount() > 0) {
            $result = $autentic->fetch(\PDO::FETCH_ASSOC);
    
            // Verifica a senha fornecida com o hash armazenado no banco de dados
            if (password_verify($usuario->getSenha(), $result['senha'])) {
                // Autenticação bem-sucedida, cria a sessão
                $_SESSION['nomeUsuario'] = $result['nome'];
                return true; // Retorna verdadeiro indicando que a autenticação foi bem-sucedida
            } else {
                return false; // Senha incorreta
            }
        } else {
            return false; // Usuário não encontrado
        }
    }
}
