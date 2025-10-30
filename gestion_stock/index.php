<?php

session_start();


$page = $_GET['page'] ?? 'accueil';

$pages_sans_layout = ['connexion'];


if (!in_array($page, $pages_sans_layout)) {
    require_once __DIR__ . '/view/commun/header.php';
}


switch ($page) {

    case 'accueil':
        require_once __DIR__ . '/pages/accueil.php';
        break;

    case 'connexion':
        require_once __DIR__ . '/view/utilisateur/connexion.php';
        break;

    case 'utilisateur':
        require_once __DIR__ . '/view/utilisateur/inscription.php';
        break;

    case 'produit':
        require_once __DIR__ . '/view/produit/listeProduit.php';
        break;

    case 'ajouterProduit':
        require_once __DIR__ . '/view/produit/ajouterProduit.php';
        break;

    case 'modifierProduit':
        require_once __DIR__ . '/view/produit/modifierProduit.php';
        break;

    case 'type':
        require_once __DIR__ . '/view/type/listeType.php';
        break;

    case 'ajouterType':
        require_once __DIR__ . '/view/type/ajouterType.php';
        break;

    case 'modifierType':
        require_once __DIR__ . '/view/type/modifierType.php';
        break;

    case 'deconnexion':
        require_once __DIR__ . '/controller/utilisateur/utilisateurController.php?action=deconnexion';
        break;

    default:
        echo "<h2 style='text-align:center; margin-top:50px;'>Page non trouvée</h2>";
        break;
}

if (!in_array($page, $pages_sans_layout)) {
    require_once __DIR__ . '/view/commun/footer.php';
}