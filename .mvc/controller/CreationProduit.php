<?php
try {
    $origine = "../../";
    require "chargeClass.php";
    require "../modele/Velo.php";
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $marque = $_POST['marque'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $roue = $_POST['roue'];
    $genre = $_POST['genre'];
    $type = $_POST['type'];
    $neuf = false;
    $electrique = false;
    $pliant = false;

    if (isset($_POST['neuf']))
        $neuf = 1;
    else{
        $neuf = 0;
    }

    if (isset($_POST['electrique']))
        $electrique = 1;
    else{
        $electrique = 0;
    }

    if (isset($_POST['pliant']))
        $pliant = 1;
    else{
        $pliant = 0;
    }

    $v1 = creerVelo(new Velo(0, $_SESSION['user'], $type, $genre, $marque, $roue, $electrique, $pliant, $prix, $neuf, $quantite, $titre, $description));
    if ($v1 == null) {
        header("Location: ../../");
    } else {
        header("Location: ../../produits/produit.php?id=" . $v1);
    }
}
catch (Exception $e){
    echo $e;
}