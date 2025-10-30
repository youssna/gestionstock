<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/produit/produitModel.php');
include('./model/type/typeModel.php');


$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php?page=produit");
    exit;
}

$produit = new Produit($bdd);
$produitById = $produit->selectById($id);

if (!$produitById) {
    echo "<p>Produit introuvable.</p>";
    exit;
}

$type = new Type($bdd);
$allTypes = $type->allTypes();

?>

<div class="container">
    <h1>Modifier le produit</h1>

    <form action="./controller/produit/produitController.php" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($produitById['id']); ?>">

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($produitById['nom']); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4"><?= htmlspecialchars($produitById['description']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="number" name="quantite" id="quantite" value="<?= htmlspecialchars($produitById['quantite']); ?>" required>
        </div>

        <div class="form-group">
            <label for="reference">Référence :</label>
            <input type="text" name="reference" id="reference" value="<?= htmlspecialchars($produitById['reference']); ?>">
        </div>

        <div class="form-group">
            <label for="type_id">Type :</label>
            <select name="type_id" id="type_id" required>
                <?php foreach ($allTypes as $type): ?>
                    <option value="<?= $type['id']; ?>" <?= $type['id'] == $produitById['type_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($type['nom']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn">💾 Enregistrer les modifications</button>
    </form>

    <br>
    <a href="index.php?page=produit" class="btn">⬅ Retour à la liste des produits</a>
</div>