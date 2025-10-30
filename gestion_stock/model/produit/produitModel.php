<?php

class Produit {

    private $bdd;

    function __construct($bdd){
        $this->bdd = $bdd;
    }


    public function allProduits(){
        $req = $this->bdd->prepare("
            SELECT p.*, t.nom AS type_nom 
            FROM produits p 
            LEFT JOIN types_produits t ON p.type_id = t.id
        ");
        $req->execute();
        return $req->fetchAll();
    }

    public function ajouterProduit($nom, $description, $quantite, $reference, $type_id){
        $req = $this->bdd->prepare("INSERT INTO produits (nom, description, quantite, reference, type_id) 
            VALUES (:nom, :description, :quantite, :reference, :type_id)");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':description', $description);
        $req->bindParam(':quantite', $quantite);
        $req->bindParam(':reference', $reference);
        $req->bindParam(':type_id', $type_id);
        return $req->execute();
    }


    public function supprimerProduit($idProduit){
        $req = $this->bdd->prepare("DELETE FROM produits WHERE id = :id");
        $req->bindParam(':id', $idProduit);
        return $req->execute();
    }


    public function modifierProduit($id, $nom, $description, $quantite, $reference, $type_id){
        $req = $this->bdd->prepare("UPDATE produits 
            SET nom = :nom, description = :description, quantite = :quantite, 
                reference = :reference, type_id = :type_id 
            WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':description', $description);
        $req->bindParam(':quantite', $quantite);
        $req->bindParam(':reference', $reference);
        $req->bindParam(':type_id', $type_id);
        return $req->execute();
    }

    public function selectById($id){
        $req = $this->bdd->prepare("SELECT * FROM produits WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $req->fetch(); 
    }
}