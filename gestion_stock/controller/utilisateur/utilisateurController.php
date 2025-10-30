<?php

include('../../bdd/bdd.php');
include('../../model/utilisateur/utilisateurModel.php');

if (isset($_GET['action']) || isset($_POST['action'])) {

    $action = $_GET['action'] ?? $_POST['action'];

    $utilisateurController = new UtilisateurController($bdd);

    switch ($action) {
        case 'inscription':
            $utilisateurController->inscription();
            break;

        case 'connexion':
            $utilisateurController->connexion();
            break;

        case 'deconnexion':
            $utilisateurController->deconnexion();
            break;

        default:
            header('Location: /gestion_stock/index.php?page=connexion');
            break;
    }
}

class UtilisateurController {

    private $utilisateur;

    public function __construct($bdd) {
        $this->utilisateur = new Utilisateur($bdd);
    }

    public function inscription() {
        $nom = trim($_POST['nom']);
        $email = trim($_POST['email']);
        $mot_de_passe =$_POST['mot_de_passe'];

        $this->utilisateur->ajouterUtilisateur($nom, $email, $mot_de_passe);

        header('Location: /gestion_stock/index.php?page=connexion');
        exit;
    }

    public function connexion() {
        $email = trim($_POST['email']);
        $mot_de_passe = $_POST['mot_de_passe'];

        // Vérifie l’utilisateur par email
        $utilisateur = $this->utilisateur->verifierUtilisateur($email);

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['utilisateur'] = $utilisateur;
            header('Location: /gestion_stock/index.php?page=accueil');
        } else {
            header('Location: /gestion_stock/index.php?page=connexion&erreur=1');
        }

        exit;
    }

    public function deconnexion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header('Location: /gestion_stock/index.php?page=connexion');
        exit;
    }
}