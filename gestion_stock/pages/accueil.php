<?php
if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php?page=connexion");
    exit;
}
?>

<div class="dashboard">
    <div class="welcome-card">
        <h1>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur']['nom']); ?></h1>
        <p>
            Vous êtes connecté à la plateforme interne d’<strong>ALMI Logistique</strong>.
            Cet espace est dédié à la gestion des stocks, des produits et des types de matériel
            utilisés dans nos opérations logistiques.
        </p>
    </div>

    <div class="stats-grid">
        <div class="card stat-card">
            <h2>Produits</h2>
            <p>Gérez et suivez l’ensemble des produits disponibles dans le stock.</p>
            <a href="index.php?page=produit" class="btn">Accéder aux produits</a>
        </div>

        <div class="card stat-card">
            <h2>Types de produits</h2>
            <p>Classez vos produits par catégories pour une meilleure organisation.</p>
            <a href="index.php?page=type" class="btn">Gérer les types</a>
        </div>

        <div class="card stat-card">
            <h2>Utilisateurs</h2>
            <p>Ajoutez ou gérez les membres autorisés à accéder à la plateforme.</p>
            <a href="index.php?page=utilisateur" class="btn">Créer un utilisateur</a>
        </div>
    </div>
</div>