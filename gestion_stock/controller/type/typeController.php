<?php
require_once __DIR__ . '/../../bdd/bdd.php';

$action = $_GET['action'] ?? '';

switch ($action) {

    // Ajouter un type
    case 'ajouter':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom']);

            if (!empty($nom)) {
                $sql = "INSERT INTO types_produits (nom) VALUES (?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom]);
            }

            header("Location: /gestion_stock/index.php?page=type");
            exit;
        }
        break;

    //  Modifier un type
    case 'modifier':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) $_POST['id'];
            $nom = trim($_POST['nom']);

            if ($id > 0 && !empty($nom)) {
                $sql = "UPDATE types_produits SET nom = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nom, $id]);
            }

    
            header("Location: /gestion_stock/index.php?page=type");
            exit;
        }
        break;

    // Supprimer un type
    case 'supprimer':
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];

            if ($id > 0) {
                $sql = "DELETE FROM types_produits WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
            }

            header("Location: /gestion_stock/index.php?page=type");
            exit;
        }
        break;

    default:
        break;
}