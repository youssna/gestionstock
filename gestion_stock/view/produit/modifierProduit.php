<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

require_once('./model/produit/produitModel.php');
require_once('./model/type/typeModel.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php?page=produit");
    exit;
}

$produit = getProduitById($id);
if (!$produit) {
    echo "<p>Produit introuvable.</p>";
    exit;
}

$types = getAllTypes();
?>

<div class="container">
    <h1>Modifier le produit</h1>

    <form action="./controller/produit/produitController.php?action=modifier" method="post">
        <input type="hidden" name="id" value="<?= $produit['id']; ?>">

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($produit['nom']); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4"><?= htmlspecialchars($produit['description']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="number" name="quantite" id="quantite" value="<?= htmlspecialchars($produit['quantite']); ?>" required>
        </div>

        <div class="form-group">
            <label for="reference">Référence :</label>
            <input type="text" name="reference" id="reference" value="<?= htmlspecialchars($produit['reference']); ?>">
        </div>

        <div class="form-group">
            <label for="type_id">Type :</label>
            <select name="type_id" id="type_id" required>
                <?php foreach ($types as $type): ?>
                    <option value="<?= $type['id']; ?>" <?= $type['id'] == $produit['type_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($type['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <br>
    <a href="index.php?page=produit">Retour à la liste des produits</a>
</div>