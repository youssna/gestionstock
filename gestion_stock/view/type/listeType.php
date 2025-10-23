<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

require_once('./model/type/typeModel.php');
$types = getAllTypes();
?>

<div class="container">
    <div class="actions-bar">
        <a href="index.php?page=ajouterType" class="btn">Ajouter un type</a>
    </div>

    <?php if (count($types) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom du type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($types as $type): ?>
                    <tr>
                        <td><?= htmlspecialchars($type['nom']); ?></td>
                        <td class="actions">
                            <a href="index.php?page=modifierType&id=<?= $type['id']; ?>" class="btn-action btn-edit">
                                Modifier
                            </a>
                            <a href="./controller/type/typeController.php?action=supprimer&id=<?= $type['id']; ?>"
                               class="btn-action btn-delete"
                               onclick="return confirm('Supprimer ce type ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun type n’a encore été enregistré.</p>
    <?php endif; ?>
</div>