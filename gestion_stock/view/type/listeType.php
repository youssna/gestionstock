<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/type/typeModel.php');

// Récupération de tous les types
$type = new Type($bdd);
$allTypes = $type->allTypes();

?>

<div class="container">
    <div class="actions-bar">
        <h1>Liste des types de produits</h1>
        <a href="index.php?page=ajouterType" class="btn">Ajouter un type</a>
    </div>

    <?php if (count($allTypes) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom du type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allTypes as $type): ?>
                    <tr>
                        <td><?= htmlspecialchars($type['nom']); ?></td>
                        <td class="actions">
                            <!-- Bouton modifier -->
                            <a href="index.php?page=modifierType&id=<?= $type['id']; ?>" class="btn-action btn-edit">
                                Modifier
                            </a>

                            <!-- Suppression en POST -->
                            <form action="./controller/type/typeController.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id" value="<?= $type['id']; ?>">
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Supprimer ce type ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun type n’a encore été enregistré.</p>
    <?php endif; ?>
</div>