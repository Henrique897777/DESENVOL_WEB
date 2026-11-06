<?php
require_once __DIR__ . '/Conexao.php';

class ClassUsuarioDAO
{
    public function cadastrar(ClassUsuario $cadastrarUsuario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuario (nome, email) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarUsuario->getNome());
            $stmt->bindValue(2, $cadastrarUsuario->getEmail());
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return FALSE;
        }
    }

    public function buscarUsuario($idUsuario)
    {
        try {
            $usuario = new ClassUsuario();
            $pdo = Conexao::getInstance();
            $sql = "SELECT idUsuario, nome, email FROM usuario WHERE idUsuario = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idUsuario);
            $stmt->execute();
            $usuarioAsso = $stmt->fetch(PDO::FETCH_ASSOC);

            $usuario->setIdUsuario($usuarioAsso['idUsuario']);
            $usuario->setNome($usuarioAsso['nome']);
            $usuario->setEmail($usuarioAsso['email']);
            return $usuario;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listarUsuarios()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return [];
        }
    }

    public function alterarUsuario(ClassUsuario $alterarUsuario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE usuario SET nome = ?, email = ? WHERE idUsuario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $alterarUsuario->getNome());
            $stmt->bindValue(2, $alterarUsuario->getEmail());
            $stmt->bindValue(3, $alterarUsuario->getIdUsuario());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function excluirUsuario($idUsuario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM usuario WHERE idUsuario = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return FALSE;
        }
    }
}