<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/type/typeModel.php');


$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php?page=type");
    exit;
}

$typeModel = new Type($bdd);
$typeById = $typeModel->selectById($id);

if (!$typeById) {
    echo "<p>Type introuvable.</p>";
    exit;
}
?>

<div class="container">
    <h1>Modifier le type de produit</h1>

    <form action="./controller/type/typeController.php" method="POST">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="id" value="<?= htmlspecialchars($typeById['id']); ?>">

        <div class="form-group">
            <label for="nom">Nom du type :</label>
            <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($typeById['nom']); ?>" required>
        </div>

        <button type="submit" class="btn"> Enregistrer les modifications</button>
    </form>

    <br>
    <a href="index.php?page=type" class="btn">Retour à la liste des types</a>
</div>