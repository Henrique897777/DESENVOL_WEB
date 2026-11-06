<?php
require_once __DIR__ . '/../Modelo/ClassUsuario.php';
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

$dao = new ClassUsuarioDAO();
$usuarios = $dao->listarUsuarios();
?>

<h2>LISTA DE USUÁRIOS</h2>

<table border="1" width="50%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= htmlspecialchars($u['nome']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td>
                <a href="index.php?idex=<?= (int)$u['idUsuario'] ?>">Editar</a>
                |
                <a href="Controle/ControleUsuario.php?ACAO=excluirUsuario&idex=<?= (int)$u['idUsuario'] ?>"
                   onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>