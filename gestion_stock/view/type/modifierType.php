<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

require_once('./model/type/typeModel.php');

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php?page=type");
    exit;
}

$type = getTypeById($id);
if (!$type) {
    echo "<p>Type introuvable.</p>";
    exit;
}
?>

<div class="container">
    <h1>Modifier le type de produit</h1>

    <form action="./controller/type/typeController.php?action=modifier" method="post">
        <input type="hidden" name="id" value="<?= $type['id']; ?>">

        <div class="form-group">
            <label for="nom">Nom du type :</label>
            <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($type['nom']); ?>" required>
        </div>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <br>
    <a href="index.php?page=type">Retour à la liste des types</a>
</div>

