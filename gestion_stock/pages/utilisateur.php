<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/utilisateur/utilisateurModel.php');

$utilisateur = new Utilisateur($bdd);
$allUtilisateurs = $utilisateur->allUtilisateurs();

?>

<div class="container">
    <h1>Liste des utilisateurs</h1>

    <a href="index.php?page=ajouterUtilisateur" class="btn">➕ Ajouter un utilisateur</a>

    <?php if (count($allUtilisateurs) > 0): ?>
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
                <?php foreach ($allUtilisateurs as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['nom']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td>
                            <form action="./controller/utilisateur/utilisateurController.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <button type="submit" onclick="return confirm('Supprimer cet utilisateur ?')" style="background:none;border:none;color:red;cursor:pointer;">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun utilisateur enregistré pour le moment.</p>
    <?php endif; ?>
</div>