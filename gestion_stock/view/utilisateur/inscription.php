<?php
// 🛡️ Protection : empêcher l'accès direct
if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
    header('Location: ../../index.php?page=connexion');
    exit;
}

// 🔐 Seuls les utilisateurs connectés (admin, par exemple) peuvent créer un compte
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
    <title>Inscription - ALMI Logistique</title>
    <link rel="stylesheet" href="/gestion_stock/assets/styles.css">
</head>
<body>

<div class="auth-container">
    <h1>Créer un utilisateur</h1>

    <form action="/gestion_stock/controller/utilisateur/utilisateurController.php?action=inscription" method="post">
        <div class="form-group">
            <label for="nom">Nom complet :</label>
            <input type="text" name="nom" id="nom" placeholder="Nom Prenom" required>
        </div>

        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" name="email" id="email" placeholder="ex: utilisateur@mail.com" required>
        </div>

        <div class="form-group">
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        </div>

        <button type="submit">Créer le compte</button>
    </form>
</div>

</body>
</html>