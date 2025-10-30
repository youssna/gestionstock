<?php


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
    <link rel="stylesheet" href="./assets/styles.css">
</head>
<body class="auth-body">

<div class="auth-container">
    <div class="auth-card">
        <h1 class="auth-title">Connexion</h1>
        <p class="auth-subtitle">Accédez à votre espace de gestion de stock</p>

        <?php if ($erreur): ?>
            <div class="alert-error">Email ou mot de passe incorrect.</div>
        <?php endif; ?>

        <form action="./controller/utilisateur/utilisateurController.php" method="POST" class="auth-form">
            <input type="hidden" name="action" value="connexion">

            <div class="form-group">
                <label for="email">Adresse email :</label>
                <input type="email" name="email" id="email" placeholder="ex: utilisateur@mail.com" required>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>

</body>
</html>