<?php
require_once __DIR__ . '/../../bdd/bdd.php';

//  Récupérer tous les produits
function getAllProduits() {
    global $pdo;
    $sql = "SELECT p.*, t.nom AS type_nom 
            FROM produits p 
            LEFT JOIN types_produits t ON p.type_id = t.id";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//  Récupérer un produit par son ID
function getProduitById($id) {
    global $pdo;
    $sql = "SELECT * FROM produits WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//  Ajouter un produit
function ajouterProduit($nom, $description, $quantite, $reference, $type_id) {
    global $pdo;
    $sql = "INSERT INTO produits (nom, description, quantite, reference, type_id)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $description, $quantite, $reference, $type_id]);
}

//  Modifier un produit
function modifierProduit($id, $nom, $description, $quantite, $reference, $type_id) {
    global $pdo;
    $sql = "UPDATE produits 
            SET nom = ?, description = ?, quantite = ?, reference = ?, type_id = ? 
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $description, $quantite, $reference, $type_id, $id]);
}

//  Supprimer un produit
function supprimerProduit($id) {
    global $pdo;
    $sql = "DELETE FROM produits WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
?>