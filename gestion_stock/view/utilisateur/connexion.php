<?php
// 🛡️ Protection : empêcher l'accès direct
if (basename($_SERVER['PHP_SELF']) !== 'index.php') {
    header('Location: ../../index.php?page=connexion');
    exit;
}

// ✅ Redirige vers l'accueil si déjà connecté
if (isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=accueil");
    exit;
}

$erreur = $_GET['erreur'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ALMI Logistique</title>
    <link rel="stylesheet" href="/gestion_stock/assets/styles.css">
</head>
<body>

<div class="auth-container">
    <h1>Connexion</h1>

    <?php if ($erreur): ?>
        <p style="color: red; font-weight: bold;">Email ou mot de passe incorrect.</p>
    <?php endif; ?>

    <form action="/gestion_stock/controller/utilisateur/utilisateurController.php?action=connexion" method="post">
        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" name="email" id="email" placeholder="ex: utilisateur@mail.com" required>
        </div>

        <div class="form-group">
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        </div>

        <button type="submit">Se connecter</button>
    </form>
</div>

</body>
</html>