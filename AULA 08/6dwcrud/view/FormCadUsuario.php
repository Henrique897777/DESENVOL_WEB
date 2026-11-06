<?php
require_once __DIR__ . '/../Modelo/ClassUsuario.php';
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

$editando = null;
if (isset($_GET['idex'])) {
    $dao = new ClassUsuarioDAO();
    $resultado = $dao->buscarUsuario($_GET['idex']);
    if ($resultado instanceof ClassUsuario) {
        $editando = $resultado;
    }
}

$acao = $editando ? 'alterarUsuario' : 'cadastrarUsuario';
?>

<h2><?= $editando ? 'Editar usuário' : 'Cadastrar usuário' ?></h2>

<form action="Controle/ControleUsuario.php?ACAO=<?= $acao ?>" method="POST">

    <?php if ($editando): ?>
        <input type="hidden" name="idex" value="<?= (int)$editando->getIdUsuario() ?>">
    <?php endif; ?>

    <label for="nome_id">Qual o seu primeiro nome?</label>
    <input type="text" id="nome_id" name="nome" required
           value="<?= $editando ? htmlspecialchars($editando->getNome()) : '' ?>">

    <br><br>

    <label for="email_id">Qual o seu email?</label>
    <input type="email" id="email_id" name="email" required
           value="<?= $editando ? htmlspecialchars($editando->getEmail()) : '' ?>">

    <br><br>

    <button type="submit"><?= $editando ? 'Salvar alterações' : 'Confirmar' ?></button>

    <?php if ($editando): ?>
        <a href="index.php">Cancelar</a>
    <?php endif; ?>
</form>