<?php

if (!isset($_SESSION['utilisateur'])) {
    header("Location: /gestion_stock/index.php?page=connexion");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - ALMI Logistique</title>
    <link rel="stylesheet" href="/gestion_stock/assets/styles.css">
</head>
<body class="auth-body">

<div class="auth-container">
    <div class="auth-card">
        <h1 class="auth-title">👤 Créer un utilisateur</h1>
        <p class="auth-subtitle">Ajoutez un nouvel accès à la plateforme ALMI Logistique</p>

        <form action="/gestion_stock/controller/utilisateur/utilisateurController.php" method="POST" class="auth-form">
            <input type="hidden" name="action" value="inscription">

            <div class="form-group">
                <label for="nom">Nom complet :</label>
                <input type="text" name="nom" id="nom" placeholder="Nom Prénom" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse email :</label>
                <input type="email" name="email" id="email" placeholder="ex: utilisateur@mail.com" required>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer le compte</button>
        </form>

        <p class="auth-footer">
            ➜ Retour à la <a href="/gestion_stock/index.php?page=accueil" class="link">page d’accueil</a>
        </p>
    </div>
</div>

</body>
</html>