<?php

include('bdd/bdd.php');
include('model/type/typeModel.php');

$type = new Type($bdd);

$id = $_GET['id'] ?? null;

if ($id) {
    $typeById = $type->selectById($id);
} else {
    echo "ID manquant.";
    exit;
}

?>