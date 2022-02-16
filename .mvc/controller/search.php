<?php
if(!empty($origine)&&!empty($search)) {
    include $origine . '.mvc/modele/Velo.php';
    include $origine . '.mvc/modele/Reparation.php';
    $velo=getVelos();
    $reparations=getReparation();

    include $origine . '.mvc/view/search.php';



}
