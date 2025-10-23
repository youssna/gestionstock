<?php
require_once('../../bdd/bdd.php');

$action = $_GET['action'] ?? '';

switch ($action) {

    // Inscription
    case 'inscription':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom']);
            $email = trim($_POST['email']);
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $email, $mot_de_passe]);

            
            header("Location: ../../index.php?page=connexion");
            exit;
        }
        break;

    // Connexion
    case 'connexion':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $mot_de_passe = $_POST['mot_de_passe'];

            $sql = "SELECT * FROM utilisateurs WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifie les identifiants
            if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['utilisateur'] = $utilisateur;

                header("Location: ../../index.php?page=accueil");
                exit;
            } else {
                header("Location: ../../index.php?page=connexion&erreur=1");
                exit;
            }
        }
        break;

    // Déconnexion
    case 'deconnexion':
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: ../../index.php?page=connexion");
        exit;
        break;

    default:
        // Pas d'action par défaut
        break;
}