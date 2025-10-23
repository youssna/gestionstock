<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

require_once('./model/type/typeModel.php');
$types = getAllTypes();
?>

<div class="container">
    <h1>Liste des types de produits</h1>

    <a href="index.php?page=ajouterType" class="btn">Ajouter un type</a>

    <?php if (count($types) > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
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
                        <td>
                            <a href="index.php?page=modifierType&id=<?= $type['id']; ?>">Modifier</a> |
                            <a href="./controller/type/typeController.php?action=supprimer&id=<?= $type['id']; ?>" onclick="return confirm('Supprimer ce type ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun type n’a encore été enregistré.</p>
    <?php endif; ?>
</div>
