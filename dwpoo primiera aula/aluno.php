<?php
require_once 'classes/Aluno.class.php';

//Instanciar a classe
$aluno1 = new Aluno();
$aluno2 = new Aluno();

$aluno1 -> nome = 'Valdemir Silva';
$aluno1 -> email = 'valdemir@ceub.edu.br';

$aluno2 -> nome = 'Vinicius Carneiro';
$aluno2 -> email = 'vinicuus@ceub.edu.br';

echo "<pre>";
print_r($aluno1);
var_dump($aluno1);

echo'<hr>';

echo "<pre>";
print_r($aluno2);
var_dump($aluno2);

?>