<?php
// ✅ Démarrer la session une seule fois ici
session_start();

// 📩 Récupérer la page demandée ou accueil par défaut
$page = $_GET['page'] ?? 'accueil';

// 📜 Liste des pages sans header/footer (connexion + inscription)
$pages_sans_layout = ['connexion'];

// ✅ Inclure le header UNIQUEMENT si la page n’est pas dans la liste
if (!in_array($page, $pages_sans_layout)) {
    require_once __DIR__ . '/view/commun/header.php';
}

// 🧭 Routage vers les pages
switch ($page) {

    // 🏠 Accueil
    case 'accueil':
        require_once __DIR__ . '/pages/accueil.php';
        break;

    // 👤 Connexion
    case 'connexion':
        require_once __DIR__ . '/view/utilisateur/connexion.php';
        break;

    // 👤 Inscription (accessible uniquement si connecté)
    case 'utilisateur':
        require_once __DIR__ . '/view/utilisateur/inscription.php';
        break;

    // 📦 Produits
    case 'produit':
        require_once __DIR__ . '/view/produit/listeProduit.php';
        break;

    case 'ajouterProduit':
        require_once __DIR__ . '/view/produit/ajouterProduit.php';
        break;

    case 'modifierProduit':
        require_once __DIR__ . '/view/produit/modifierProduit.php';
        break;

    // 🏷️ Types
    case 'type':
        require_once __DIR__ . '/view/type/listeType.php';
        break;

    case 'ajouterType':
        require_once __DIR__ . '/view/type/ajouterType.php';
        break;

    case 'modifierType':
        require_once __DIR__ . '/view/type/modifierType.php';
        break;

    // 🚪 Déconnexion
    case 'deconnexion':
        require_once __DIR__ . '/controller/utilisateur/utilisateurController.php?action=deconnexion';
        break;

    // ❌ Page inconnue
    default:
        echo "<h2 style='text-align:center; margin-top:50px;'>Page non trouvée</h2>";
        break;
}

// ✅ Inclure le footer UNIQUEMENT si la page n’est pas dans la liste
if (!in_array($page, $pages_sans_layout)) {
    require_once __DIR__ . '/view/commun/footer.php';
}