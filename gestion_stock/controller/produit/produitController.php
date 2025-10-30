<?php

include('../../bdd/bdd.php');
include('../../model/produit/produitModel.php');

if (isset($_POST['action'])) {

    $produitController = new ProduitController($bdd);

    switch ($_POST['action']) {
        case 'ajouter':
            $produitController->create();
            break;

        case 'update':
            $produitController->update();
            break;

        case 'supprimer':
            $produitController->delete();
            break;

        default:
            header('Location: /gestion_stock/index.php?page=produit');
            break;
    }
}

class ProduitController {

    private $produit;

    function __construct($bdd) {
        $this->produit = new Produit($bdd);
    }

    public function create() {
        $this->produit->ajouterProduit(
            $_POST['nom'],
            $_POST['description'],
            $_POST['quantite'],
            $_POST['reference'],
            $_POST['type_id']
        );

        header('Location: /gestion_stock/index.php?page=produit');
    }

    public function update() {
        $this->produit->modifierProduit(
            $_POST['id'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['quantite'],
            $_POST['reference'],
            $_POST['type_id']
        );

        header('Location: /gestion_stock/index.php?page=produit');
    }

    public function delete() {
        $this->produit->supprimerProduit($_POST['id']);

        header('Location: /gestion_stock/index.php?page=produit');
    }
}