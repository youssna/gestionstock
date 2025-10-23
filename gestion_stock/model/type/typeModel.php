<?php
require_once __DIR__ . '/../../bdd/bdd.php';

// Récupérer tous les types de produits
function getAllTypes() {
    global $pdo;
    $sql = "SELECT * FROM types_produits";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer un type par son ID
function getTypeById($id) {
    global $pdo;
    $sql = "SELECT * FROM types_produits WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Ajouter un type
function ajouterType($nom) {
    global $pdo;
    $sql = "INSERT INTO types_produits (nom) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom]);
}

//  Modifier un type
function modifierType($id, $nom) {
    global $pdo;
    $sql = "UPDATE types_produits SET nom = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $id]);
}

//  Supprimer un type
function supprimerType($id) {
    global $pdo;
    $sql = "DELETE FROM types_produits WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
?>