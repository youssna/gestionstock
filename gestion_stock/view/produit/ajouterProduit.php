<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/type/typeModel.php');

$type = new Type($bdd);
$allTypes = $type->allTypes();

?>

<div class="container">
    <h1>Ajouter un produit</h1>

    <form action="./controller/produit/produitController.php" method="POST">
        <input type="hidden" name="action" value="ajouter">

        <div class="form-group">
            <label for="nom">Nom du produit :</label>
            <input type="text" name="nom" id="nom" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="number" name="quantite" id="quantite" min="0" required>
        </div>

        <div class="form-group">
            <label for="reference">Référence :</label>
            <input type="text" name="reference" id="reference">
        </div>

        <div class="form-group">
            <label for="type_id">Type de produit :</label>
            <select name="type_id" id="type_id" required>
                <option value="">-- Sélectionner un type --</option>
                <?php foreach ($allTypes as $type): ?>
                    <option value="<?= $type['id']; ?>"><?= htmlspecialchars($type['nom']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Ajouter le produit</button>
    </form>

    <br>
    <a href="index.php?page=produit">⬅ Retour à la liste des produits</a>
</div>