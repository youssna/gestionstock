<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}
?>

<div class="container">
    <h1>Ajouter un type de produit</h1>

    <form action="./controller/type/typeController.php?action=ajouter" method="post">
        <div class="form-group">
            <label for="nom">Nom du type :</label>
            <input type="text" name="nom" id="nom" placeholder="Ex : Électronique, Pièces mécaniques..." required>
        </div>

        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="index.php?page=type">Retour à la liste des types</a>
</div>