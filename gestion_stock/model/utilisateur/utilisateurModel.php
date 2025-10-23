<?php
require_once('../../bdd/bdd.php');

// Récupérer tous les utilisateurs
function getAllUtilisateurs() {
    global $pdo;
    $sql = "SELECT id, nom, email FROM utilisateurs";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer un utilisateur par son ID
function getUtilisateurById($id) {
    global $pdo;
    $sql = "SELECT id, nom, email FROM utilisateurs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Ajouter un utilisateur (inscription)
function ajouterUtilisateur($nom, $email, $mot_de_passe) {
    global $pdo;
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $email, $mot_de_passe_hash]);
}

// Vérifier un utilisateur pour la connexion
function verifierConnexion($email, $mot_de_passe) {
    global $pdo;
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        return $utilisateur;
    }
    return false;
}

// Supprimer un utilisateur
function supprimerUtilisateur($id) {
    global $pdo;
    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
?>