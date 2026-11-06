<?php
require_once 'classes/Cliente.class.php';

$cliente1 = new Cliente();
$cliente2 = new Cliente();

$cliente1 -> validar('Maria das Dores', 'mariadasflores@gmail.com');
$cliente1 -> exibir();

$cliente2 -> validar('José das Couves', 'josedascouves@gmail.com');
$cliente2 -> exibir();

?>