<?php
class Conexao 

{

    public static function getInstance()
    {
        $dsn = 'mysql:host=localhost;dbname=db_php';
        $user = 'root';
        $password = '';
        try{
            $pdo = new PDO($dsn, $user, $password);
            $pdo-> setATTribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
            
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

}


