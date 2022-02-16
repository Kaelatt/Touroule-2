<?php
$origine = '../../';
require ('chargeClass.php');
require '../modele/Velo.php';

if ($_SESSION['admin']) {
    supprimerVelo((int) $_GET['id']);
}

header("Location: ".$origine);
?>