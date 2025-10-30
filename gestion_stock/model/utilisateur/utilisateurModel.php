<?php

class Utilisateur {

    private $bdd;

    function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function allUtilisateurs() {
        $req = $this->bdd->prepare("SELECT id, nom, email FROM utilisateurs");
        $req->execute();
        return $req->fetchAll();
    }

    public function selectById($id) {
        $req = $this->bdd->prepare("SELECT id, nom, email FROM utilisateurs WHERE id = :id");
        $req->bindParam(':id', $id);
        $req->execute();
        return $req->fetch();
    }

    public function ajouterUtilisateur($nom, $email, $mot_de_passe) {
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $req = $this->bdd->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':email', $email);
        $req->bindParam(':mot_de_passe', $mot_de_passe_hash);
        return $req->execute();
    }

    public function verifierUtilisateur($email) {
        $req = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->execute();
        return $req->fetch();
    }

    public function supprimerUtilisateur($id) {
        $req = $this->bdd->prepare("DELETE FROM utilisateurs WHERE id = :id");
        $req->bindParam(':id', $id);
        return $req->execute();
    }
}