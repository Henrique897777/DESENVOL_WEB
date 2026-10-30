<?php
require_once 'Conexao.php';
class ClassUsuarioDAO
{
    public function cadastrar(ClassUsuario $cadastrarUsuario)

    {
        try{
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuario(nomem email) values (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarUsuario->getNome());
            $stmt->bindValue(2, $cadastrarUsuario->getEmail());
            $stmt->execute();
            return TRUE;

        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public function buscarUsuario(idUsuario)
    {
        try{
            $usuario = new ClassUsuario();
            $pdo = Conexao::getInstance();
            $sql = "SELECT idUsuario, nome, email FROM usuario WHERE idUsuario =:id LIMIT 1";
            $stmt = $pdo -> prepare($sql);
            $stmt->bindValue(':id', $idUsuario);

            $stmt->execute();
            $usuarioAsso = $stmt->fetch(PDO::FETCH_ASSOC);
            $usuario->setidUsuario($usuarioAssac['idUsuario']);
            $usuario->setNome($usuarioAssac['nome']);
            $usuario->setEmail($usuarioAssac['email']);

            return $usuario;

        }catch (PDOException $ex){
            return $ex->getMessage();
        }
    }

    public function listarUsuarios()
    {
        try{
            $pdo =Conexao::getInstacnce();
            $sql = "SELECT *FROM usuario";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $alunos;


        }catch(PDOException $exc){
            echo $exc ->getMessage();
        }
    }

    public function alterarUsuario(ClassUsuario $alterarUsuario)
    {
        try{
            $pdo = Conexao::getInstance();
            $sql = "UPDATE usuario SET nome = ?, email = ? WHERE iduUsuario = ?";
            $stmt = $pdo ->prepare($sql);
            $stmt->bindValue(1, $alterarusuario->getNome);
            $stmt->bindValue(2, $alterarusuario->getEmail);
            $stmt->bindValue(3, $alterarusuario->getidUusuario);
            $stmt->execute();
            return $stmt ->rowCount();
        }cath(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function excluirUsuario($idUsuario)
    {
        try{
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM usuario Where idUsuario = ?";
            $smtm = $pdo->prepare($sql);
            $smtm->bindValue(':idUsuario', $idUsuario);
            $smtm->execute();
            return TRUE;
        }catch(PDOException $exc){
            echo $exc->getMessage();
        }
    }

}