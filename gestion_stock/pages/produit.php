<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

require_once('./model/produit/produitModel.php');
$produits = getAllProduits();
?>


<div class="container">
    <h1>Liste des produits</h1>

    <a href="index.php?page=ajouterProduit" class="btn">Ajouter un produit</a>

    <?php if (count($produits) > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>

                    <th>Nom</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Référence</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit): ?>
                    <tr>
          
                        <td><?= htmlspecialchars($produit['nom']); ?></td>
                        <td><?= htmlspecialchars($produit['description']); ?></td>
                        <td><?= htmlspecialchars($produit['quantite']); ?></td>
                        <td><?= htmlspecialchars($produit['reference']); ?></td>
                        <td><?= htmlspecialchars($produit['type_nom']); ?></td>
                        <td>
                            <a href="index.php?page=modifierProduit&id=<?= $produit['id']; ?>">Modifier</a> |
                            <a href="./controller/produit/produitController.php?action=supprimer&id=<?= $produit['id']; ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun produit n’a encore été enregistré.</p>
    <?php endif; ?>
</div>
