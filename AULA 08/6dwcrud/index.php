<!DOCTYPE html>
<html lang="en">
<?php
$msg =@$_GET['MSG'];
if ($msg != null || $msg != ''){
    echo "<script>alert('$msg') </script>";
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>

    <h1>Sistema de cadastro de Usuários</h1>
    <?php
    echo "<hr>";
    include 'View/FormCadUsuario.php';
    echo "<hr>";
    include 'View/ListarUsuario.php';
    ?>

    
</body>
</html>