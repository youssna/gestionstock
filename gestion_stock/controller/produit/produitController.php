<?php
require_once __DIR__ . '/../../bdd/bdd.php';

$action = $_GET['action'] ?? '';

switch ($action) {

    // Ajouter un produit
    case 'ajouter':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $quantite = (int) $_POST['quantite'];
            $reference = trim($_POST['reference']);
            $type_id = (int) $_POST['type_id'];

            if (!empty($nom) && $type_id > 0) {
                $sql = "INSERT INTO produits (nom, description, quantite, reference, type_id)
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $description, $quantite, $reference, $type_id]);
            }


            header("Location: /gestion_stock/index.php?page=produit");
            exit;
        }
        break;

    // Modifier un produit
    case 'modifier':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) $_POST['id'];
            $nom = trim($_POST['nom']);
            $description = trim($_POST['description']);
            $quantite = (int) $_POST['quantite'];
            $reference = trim($_POST['reference']);
            $type_id = (int) $_POST['type_id'];

            if ($id > 0 && !empty($nom)) {
                $sql = "UPDATE produits 
                        SET nom = ?, description = ?, quantite = ?, reference = ?, type_id = ? 
                        WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $description, $quantite, $reference, $type_id, $id]);
            }

            header("Location: /gestion_stock/index.php?page=produit");
            exit;
        }
        break;

    // Supprimer un produit
    case 'supprimer':
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];

            if ($id > 0) {
                $sql = "DELETE FROM produits WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
            }

            header("Location: /gestion_stock/index.php?page=produit");
            exit;
        }
        break;

    
    default:
        break;
}