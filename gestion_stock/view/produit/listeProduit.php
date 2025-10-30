<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/produit/produitModel.php');

$produit = new Produit($bdd);
$allProduits = $produit->allProduits();

?>

<div class="container">
    <div class="actions-bar">
        <h1>Liste des produits</h1>
        <a href="index.php?page=ajouterProduit" class="btn">Ajouter un produit</a>
    </div>

    <?php if (count($allProduits) > 0): ?>
        <table>
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
                <?php foreach ($allProduits as $produit): ?>
                    <tr>
                        <td><?= htmlspecialchars($produit['nom']); ?></td>
                        <td><?= htmlspecialchars($produit['description']); ?></td>
                        <td><?= htmlspecialchars($produit['quantite']); ?></td>
                        <td><?= htmlspecialchars($produit['reference']); ?></td>
                        <td><?= htmlspecialchars($produit['type_nom']); ?></td>
                        <td class="actions">
                            <!-- Bouton modifier -->
                            <a href="index.php?page=modifierProduit&id=<?= $produit['id']; ?>" class="btn-action btn-edit"> Modifier
                            </a>

                            <!-- Bouton supprimer sécurisé -->
                            <form action="./controller/produit/produitController.php" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id" value="<?= $produit['id']; ?>">
                                <button type="submit" class="btn-action btn-delete" onclick="return confirm('Supprimer ce produit ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun produit n’a encore été enregistré.</p>
    <?php endif; ?>
</div>