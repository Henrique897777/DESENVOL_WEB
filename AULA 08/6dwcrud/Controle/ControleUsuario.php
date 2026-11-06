<?php
require_once '../Modelo/ClassUsuario.php';
require_once '../Modelo/DAO/ClassUsuarioDAO.php';

$id =@$_POST['idex'];
$nome =@$_POST['nome'];
$email =@$_POST['email'];
$acao =@$_GET['ACAO'];

$novoUsuario = new ClassUsuario();
$novoUsuario ->setidUsuario($id);
$novoUsuario ->setNome($nome);
$novoUsuario ->setEmail($email);

$classUsuarioDAO = new ClassUsuarioDAO();
switch($acao){
    case "cadastrarUsuario":
        $usuario = $classUsuarioDAO->cadastrar($novoUsuario);
        if($usuario >=1){
            header('Location:../index.php?MSG= Cadastro realizado com sucesso!');
        }else{
            header('Location:../index.php?MSG= Não foi possível realizar o cadastro');
        }
        break;

    case "alterarUsuario":
        $usuario = $classUsuarioDAO->alterarUsuario($novoUsuario);
        if($usuario >=1){
            header('Location:../index.php?MSG= Cadastro alterado com sucesso!');
        }else{
            header('Location:../index.php?MSG= Não foi possível alterar o cadastro');
        }
        break;

    case "excluirUsuario";
        if(isset($_GET['idex'])){
            $idUsuario = $_GET['idex'];
            $classUsuarioDAO = new ClassUsuarioDAO();
            $us = $classUsuarioDAO->excluirUsuario($idUsuario);
            if($us == TRUE){
                header('Location:../index.php?PAGINA=listarUsuario&MSG= Usuário foi excluido com sucesso!');
            } else{
                header('Location:../index.php?PAGINA=listarUsuario&MSG= NÃO foi possível excluir o usuário!');
            }
        }
        break;

        default :
        break;

}

