<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

require_once('./model/utilisateur/utilisateurModel.php');
$utilisateurs = getAllUtilisateurs();
?>

<div class="container">
    <h1>Liste des utilisateurs</h1>

    <a href="index.php?page=utilisateur" class="btn">➕ Ajouter un utilisateur</a>

    <?php if (count($utilisateurs) > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur['id']); ?></td>
                        <td><?= htmlspecialchars($utilisateur['nom']); ?></td>
                        <td><?= htmlspecialchars($utilisateur['email']); ?></td>
                        <td>
                            <a href="./controller/utilisateur/utilisateurController.php?action=supprimer&id=<?= $utilisateur['id']; ?>"
                               onclick="return confirm('Supprimer cet utilisateur ?')">🗑️ Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun utilisateur enregistré pour le moment.</p>
    <?php endif; ?>
</div>