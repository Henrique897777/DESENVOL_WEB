<?php
class ClassUsuario
{
    private $idUsuario;
    private $nome;
    $private $email;

    function getIdUsuario()
    {
        return $this->idUsuario;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    function setNiome($nome)
    {
        $this->nome = $nome;
    }
    
    function setEmail($email)
    {
        $this->email = $email;
    }
}