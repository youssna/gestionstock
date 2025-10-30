<?php

include('bdd/bdd.php');
include('model/type/typeModel.php');

$type = new Type($bdd);
$allTypes = $type->allTypes();

?>