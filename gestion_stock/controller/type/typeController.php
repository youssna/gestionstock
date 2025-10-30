<?php

include('../../bdd/bdd.php');
include('../../model/type/typeModel.php');

if (isset($_POST['action'])) {

    $typeController = new TypeController($bdd);

    switch ($_POST['action']) {
        case 'ajouter':
            $typeController->create();
            break;

        case 'update':
            $typeController->update();
            break;

        case 'supprimer':
            $typeController->delete();
            break;

        default:
            header('Location: /gestion_stock/index.php?page=type');
            break;
    }
}

class TypeController {

    private $type;

    function __construct($bdd) {
        $this->type = new Type($bdd);
    }

    public function create() {
        $this->type->ajouterType($_POST['nom']);

        header('Location: /gestion_stock/index.php?page=type');
    }

    public function update() {
        $this->type->modifierType($_POST['id'], $_POST['nom']);

        header('Location: /gestion_stock/index.php?page=type');
    }

    public function delete() {
        $this->type->supprimerType($_POST['id']);

        header('Location: /gestion_stock/index.php?page=type');
    }
}