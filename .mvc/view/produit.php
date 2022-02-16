<?php
$dev = "Guillier";

$title = "";
$comment = ""; // Optional

ob_start();
/* Page en HTML ↓ */
if (!empty($velo) &&!empty($compte)&&!empty($genre)&&!empty($type)) {
?>

    <header>
        <h1><?php echo "{$velo->getTitre()}"?></h1>
        <p>
            <br/><br/>
            <span style="font-size: x-large">
            </span>
        </p>
    </header>

    <object> <!--Description-->
        <h4>Description :</h4>
        <p>
            <?php echo "{$velo->getDescription()}"?>
        </p>
    </object>
    <object> <!--Prix-->
        <h4>Prix :</h4>
        <p>
            <?php echo "{$velo->getPrix()}"?>
            €
        </p>
    </object>
    <object> <!--Localisation-->
        <h4>Localisation :</h4>
        <p>
            <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src=<?php echo "https://www.google.com/maps/embed/v1/place?q={$compte->getVille()}&key=AIzaSyDE9r7eSVfHz1uAin1513MZ6PXvB35R0Dw"?>></iframe>    </object>
        </p>

        <h4>Information technique :</h4>
    <p>
        <?php
        echo "<a href='".$origine."/comptes/profil_utilisateur/?id=".$velo->getIdCompte()."'>Le vendeur</a><br/>";
        echo "Marque: {$velo->getMarque()}<br>";
        echo "Genre: {$genre->getName()}<br>";
        echo "Type: {$type->getName()}<br>";
        echo "taille roue: {$velo->getTailleRoue()}\"<br>";
        if(!empty($electrique)){
            echo "Electrique: Oui<br>";
        }else{
            echo "Electrique: Non<br>";
        }
        if(!empty($pliant)){
            echo "Pliant: Oui<br>";
        }else{
            echo "Pliant: Non<br>";
        }
        if(!empty($neuf)){
            echo "Neuf: Oui<br>";
        }else{
            echo "Neuf: Non<br>";
        }

        ?>
    </p>

    <a href="<?= $origine.".mvc/controller/addProduit.php?id=".$velo->getIdVelo() ?>"><button>Ajouter au panier</button></a>
    <?php

    if ($_SESSION['admin']){
        echo "<a href='".$origine.".mvc/controller/deleteProduit.php?id=".$velo->getIdVelo()."'><button>Supprimer le produit</button></a>";
    }

    ?>
<?php /* Page en HTML ↑ */
}
$content = ob_get_clean();

include $origine.".mvc/view/include_require/template.php";
?>