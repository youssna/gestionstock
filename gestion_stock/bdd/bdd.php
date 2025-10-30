<?php

try {
    $users = "root";
    $pass = "root"; // Mets "" si tu n'as pas de mot de passe sur MAMP/WAMP
    $bdd = new PDO("mysql:host=localhost;dbname=gestion_stock;charset=utf8", $users, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur ! : " . $e->getMessage() . "<br/>";
    die();
}

?>