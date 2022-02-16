<?php
try {
    $origine = "../../";
    require "chargeClass.php";
    require "../modele/Reparation.php";
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $categories = getCategories();
    $cat=[];
    foreach ($categories as $c){
    }

    $v1 = creerReparation(new Reparation(0, $_SESSION['user'],$titre,$description,[]));
    if ($v1 == null) {
        header("Location: ../../");
    } else {
        header("Location: ../../services/service.php?id=" . $v1);
    }
}
catch (Exception $e){
    echo $e;
}