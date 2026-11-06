<?php

class Cliente{
    var $nome, $email;

    public function setNome($n){
        $this -> nome = $n;
    }

    public function setEmail($e){
        $this -> email = $e;

    }

    public function getNome(){
        return $this -> nome ;

    }

    public function getEmail(){
        return $this -> email;

    }

    public function validar($n,$e){
        //$this -> nome = $n;
        //$this -> email = $e;
        $this -> setNome($n);
        $this -> setEmail($e);

    }

    public function exibir(){
        //echo 'Nome': '
        //

        echo 'Nome: '.$this -> getNome(). '<br>';
        echo 'E-mail'.$this -> getEmail(). '<br><br>';

    }
}

?>