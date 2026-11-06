<?php
class Conexao
{
    public static function getInstance()
    {
        $dsn = 'mysql:host=127.0.0.1;port=3307;dbname=bdphp;charset=utf8mb4';
        $user = 'root';
        $password = '';

        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

