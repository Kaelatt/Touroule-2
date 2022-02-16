<?php
if(!empty($origine)&&!empty($id)) {

    include $origine . '.mvc/modele/Reparation.php';
    echo $id;
    $reparation = getReparationid($id);
    if (!empty($reparation)) {
        $compte = getCompteid($reparation->getCompte());
        $categories = $reparation->getCategories();
    }
    include $origine . ".mvc/view/service.php";
}