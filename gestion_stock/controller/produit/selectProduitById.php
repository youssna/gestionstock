<?php

include('bdd/bdd.php');
include('model/produit/produitModel.php');

$produit = new Produit($bdd);
$produitById = $produit->selectById();

?>