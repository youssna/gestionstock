<?php

class Type {

    private $bdd;

    function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function allTypes() {
        $req = $this->bdd->prepare("SELECT * FROM types_produits");
        $req->execute();
        return $req->fetchAll();
    }

    public function ajouterType($nom) {
        $req = $this->bdd->prepare("INSERT INTO types_produits (nom) VALUES (:nom)");
        $req->bindParam(':nom', $nom);
        return $req->execute();
    }

    public function modifierType($id, $nom) {
        $req = $this->bdd->prepare("UPDATE types_produits SET nom = :nom WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->bindParam(':nom', $nom);
        return $req->execute();
    }

    public function supprimerType($id) {
        $req = $this->bdd->prepare("DELETE FROM types_produits WHERE id = :id");
        $req->bindParam(':id', $id);
        return $req->execute();
    }

    public function selectById($id) {
        $req = $this->bdd->prepare("SELECT * FROM types_produits WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $req->fetch();
    }
}