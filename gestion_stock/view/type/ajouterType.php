<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}

include('./bdd/bdd.php');
include('./model/type/typeModel.php');

?>

<div class="container">
    <h1>Ajouter un type de produit</h1>

    <form action="./controller/type/typeController.php" method="POST">
        <input type="hidden" name="action" value="ajouter">

        <div class="form-group">
            <label for="nom">Nom du type :</label>
            <input type="text" name="nom" id="nom" placeholder="Ex : Électronique, Pièces mécaniques..." required>
        </div>

        <button type="submit" class="btn">➕ Ajouter le type</button>
    </form>

    <br>
    <a href="index.php?page=type" class="btn">⬅ Retour à la liste des types</a>
</div>